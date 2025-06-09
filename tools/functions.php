<?php
// Navbar function
function navbar($dbconn)
{
    $navigation_query = "SELECT * FROM navigation WHERE status = 1 AND deleted = 0";
    $navigation_items = mysqli_query($dbconn, $navigation_query);
    if (mysqli_num_rows($navigation_items) > 0) {
        print '
            <nav class="nav-main mainmenu-nav d-none d-xl-block">
                <ul class="mainmenu">';
        while ($navigation_item = mysqli_fetch_assoc($navigation_items)) {
            $link = empty($navigation_item['link']) ? base_url() : $navigation_item['link'];
            $navigation_id = $navigation_item['id'];
            $sub_navigation_query = "select * from sub_navigation where parent = '$navigation_id' and status = 1 and deleted = 0";
            $sub_navigation_items = mysqli_query($dbconn, $sub_navigation_query);
            if (mysqli_num_rows($sub_navigation_items) > 0) {
                echo '<li class="has-droupdown">
                    <a class="nav-link" href="' . $link . '">' . ucwords($navigation_item['item']) . '</a>';
                print '<ul class="submenu">';
                while ($sub_navigation_item = mysqli_fetch_assoc($sub_navigation_items)) {
                    echo '
                        <li class="">
                            <a href="' . $sub_navigation_item['link'] . '" class="">' . ucwords($sub_navigation_item['item']) . '</a>
                        </li>';
                }
                echo '</ul>';
            } else {
                print '<li class="">
                    <a class="nav-item" href="' . $link . '">' . ucfirst($navigation_item['item']) . '</a>';
            }
            echo '</li>';
        }
        echo '</ul>
            </nav>';
    }
}

// Mobile navbar
function mobile_navbar($dbconn)
{
    $navigation_query = "SELECT * FROM navigation WHERE status = 1 AND deleted = 0";
    $navigation_items = mysqli_query($dbconn, $navigation_query);
    if (mysqli_num_rows($navigation_items) > 0) {
        print '
                <nav class="nav-main mainmenu-nav">
                <ul class="mainmenu">';
        while ($navigation_item = mysqli_fetch_assoc($navigation_items)) {
            $link = empty($navigation_item['link']) ? base_url() : $navigation_item['link'];
            $navigation_id = $navigation_item['id'];
            $sub_navigation_query = "select * from sub_navigation where parent = '$navigation_id' and status = 1 and deleted = 0";
            $sub_navigation_items = mysqli_query($dbconn, $sub_navigation_query);
            if (mysqli_num_rows($sub_navigation_items) > 0) {
                echo '<li class="has-droupdown">
                    <a class="nav-link" href="' . $link . '">' . ucwords($navigation_item['item']) . '</a>';
                print '<ul class="submenu">';
                while ($sub_navigation_item = mysqli_fetch_assoc($sub_navigation_items)) {
                    echo '
                        <li class="">
                            <a href="' . $sub_navigation_item['link'] . '" class="">' . ucwords($sub_navigation_item['item']) . '</a>
                        </li>';
                }
                echo '</ul>';
            } else {
                print '<li class="">
                    <a class="nav-item" href="' . $link . '">' . ucfirst($navigation_item['item']) . '</a>';
            }
            echo '</li>';
        }
        echo '</ul>
            </nav>';
    }
}

// Get all items from the table
function get_items_w_custom_query($dbconn, $query)
{
    return mysqli_query($dbconn, $query);
}

// Get all items from the table
function get_all_items($dbconn, $table)
{
    // Select data query
    $select_data_query = 'select * from ' . $table . ' where deleted = 0';
    return mysqli_query($dbconn, $select_data_query);
}

// Get select items from the table
function get_items($dbconn, $table, $where)
{
    // Select data query
    $select_data_query = 'select * from ' . $table . ' ' . $where;
    return mysqli_query($dbconn, $select_data_query);
}

// Get compare strings
function get_non_similar_strings($old_string, $new_string)
{
    if (strcasecmp($old_string, $new_string) != 0) {
        return '<span class="text-danger font-weight-bold">' . $new_string . '</span>';
    } else {
        return $old_string;
    }
}

// Get single item
function get_item_data($dbconn, $table, $where)
{
    if (empty($where)) {
        $select_data_query = 'select * from ' . $table;
    } else {
        $select_data_query = 'select * from ' . $table . ' ' . $where;
    }
    // return $select_data_query;
    return mysqli_fetch_assoc(mysqli_query($dbconn, $select_data_query));
}

function get_item_name_by_id($dbconn, $table, $column, $id_column_name, $id)
{
    if (empty($id_column_name) && empty($id)) {
        $where = '';
    } else {
        $where = "where $id_column_name = '$id' and status = 1 and deleted = 0";
    }
    if (!empty($id)) {
        $module = get_item_data($dbconn, $table, $where);
        return !empty($module[$column]) ? $module[$column] : null;
    }
}

// Print item if not empty
function check_if_not_empty($item)
{
    if (!empty($item)) {
        return $item;
    }
}

// Count table items
function count_items($dbconn, $sql)
{
    return $rowcount = mysqli_num_rows(mysqli_query($dbconn, $sql));
}

// Return booleans from check box 
function check_box_boolean($value)
{
    if (strcasecmp($value, "on") == 0) {
        return 1;
    } else {
        return 0;
    }
}

// Encode array
function encode_array($array)
{
    return urlencode(serialize($array));
}

// Decode array
function decode_array($encoded_array)
{
    return unserialize(urldecode($encoded_array));
}

// Check if the event exists
function check_if_record_exists($dbconn, $query)
{
    $result = $dbconn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function getIPAddress()
{
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $clientIP = $_SERVER['HTTP_CLIENT_IP'];
    } else {
        $clientIP = $_SERVER['REMOTE_ADDR'];
    }

    return $clientIP;
}

// Function to select gender
function select_gender($gender = 0)
{
    print '<div class="form-group">
                <label class="font-weight-bold">Gender<span class="text-danger"> (*Required)</span></label>
                <select class="custom-select2 form-control form-control-sm" id="gender" name="gender">';
    if ($gender == 1) {
        print '
                <option value="1" selected>Male</option>
                <option value="0">Female</option>';
    } else {
        print '
                <option value="0" selected>Female</option>
                <option value="1">Male</option>';
    }
    print ' </select>
            </div>';
}

// Return authorized sub modules
function get_dept_allowed_sub_modules($dbconn, $dept)
{
    $query = "select sub_module.sub_module_name as sub_module_name, sub_module.sub_module_id as sub_module_id from sub_module,module_assignment where sub_module.module = module_assignment.module and module_assignment.department = '$dept'";
    return $allowed_sub_modules = mysqli_query($dbconn, $query);
}

// get_assigned_modules
function get_assigned_modules($dbconn, $department_id)
{
    foreach (get_items($dbconn, "module_assignment", " where department = '$department_id' and deleted = 0") as $module) {
        print '<span class="badge badge-dark">' . get_item_name_by_id($dbconn, 'module', 'module_name', 'module_id', $module['module']) . '</span>&nbsp;';
    }
}

// get_staff_assigned_roles
function get_staff_assigned_roles($dbconn, $staff_id)
{
    if (!empty($staff_id)) {
        foreach (get_items($dbconn, "assigned_staff_role", " where staff = '$staff_id' and deleted = 0") as $staff_role) {
            print '<span class="badge badge-primary">' . ucwords(get_item_name_by_id($dbconn, 'staff_role', 'title', 'staff_role_id', $staff_role['staff_role'])) . '</span>&nbsp;';
        }
    }
}

// Get staff role permissions
function get_role_permissions($dbconn, $staff_role)
{
    foreach (get_items($dbconn, "staff_role_permission", " where deleted = 0 and staff_role = '$staff_role'") as $permission) {
        print '<span class="badge badge-dark">' . ucwords(get_item_name_by_id($dbconn, 'permission', 'permission', 'permission_id', $permission['permission'])) . '</span>&nbsp;';
    }
}

// Get user title
function get_gender($gender)
{
    if ($gender != 1) {
        print 'F';
    } else {
        print 'M';
    }
}

// Render CSRF token
function render_tokens($token_name)
{
    $token_name = $token_name . '_token';
    $_SESSION[$token_name] = md5(uniqid(mt_rand(), true));
    echo '<input type="hidden" name="user" value="' . $_SESSION['control']['id'] . '" />';
    echo '<input type="hidden" value="' . $_SESSION[$token_name] . '" name="' . $token_name . '" />';
}

// Display status
function display_status($status)
{
    if ($status == 1) {
        print '<span class="badge badge-success"><i class="icon-copy fa fa-check" aria-hidden="true"></i></span>';
    } else {
        print '<span class="badge badge-danger"><i class="icon-copy fa fa-ban" aria-hidden="true"></i></span>';
    }
}

// Display alerts
function display_alerts()
{
    if (isset($_SESSION["success"])) {
        print '<div class="alert alert-success" role="alert">' . $_SESSION["success"];
        unset($_SESSION["success"]);
        print '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> </button>
                    </div>';
    } else if (isset($_SESSION["error"])) {
        print '<div class="alert alert-danger" role="alert">' . $_SESSION["error"];
        unset($_SESSION["error"]);
        print '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>';
    }
}

// Activate or deactivate actions
function status_buttons($url, $process, $name, $status, $id)
{
    if ($status != 1) {
        print '<a href="' . $url . 'processes/' . $process . '?activate_' . $name . '=' . $id . '" class="btn btn-sm btn-success activate"><i class="icon-copy fa fa-thumbs-up" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Activate"></i></a>';
    } else {
        print '<a href="' . $url . 'processes/' . $process . '?deactivate_' . $name . '=' . $id . '" class="btn btn-sm btn-warning deactivate"><i class="icon-copy fa fa-thumbs-down" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Deactivate"></i></a>';
    }
}

// Deny button
function deny_button($link)
{
    // <i class="icon-copy fa fa-minus-circle" aria-hidden="true"></i>
    print '<a href="' . $link . '" class="btn btn-sm btn-danger deny"><i class="icon-copy fa fa-times-circle" aria-hidden="true"></i></a>';
}

// Allow button
function allow_button($link)
{
    // <i class="icon-copy fa fa-minus-circle" aria-hidden="true"></i>
    print '<a href="' . $link . '" class="btn btn-sm btn-success allow"><i class="icon-copy fa fa-check" aria-hidden="true"></i></a>';
}

// Delete button
function delete_button($link)
{
    print '<a href="' . $link . '" class="btn btn-sm btn-danger delete"><i class="icon-copy fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
}

// Edit button
function edit_button($href)
{
    print '<a href="' . $href . '" class="btn btn-sm btn-primary"><i class="icon-copy fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>';
}

//Database CRUD table
function db_crud($dbconn, $query, $redirect)
{
    if ($dbconn->query($query) === true) {
        $_SESSION["success"] = 'Action was competed succesfully';
        header('Location: ' . $redirect);
        exit();
    } else {
        $_SESSION['error'] = 'Failed to complete action successfully. Maybe because: ' . $dbconn->error;
        header('Location: ' . $redirect);
        exit();
    }
}

// // Execute prepared statement
// function executePreparedStmt($dbconn,$stmt, $redirect,$success_message='', $error_message= '') { 
//     // Set success and error messages with defaults
//     $_SESSION["success"] = !empty($success_message) ? $success_message : "Action completed successfully!";
//     $_SESSION["error"] = !empty($error_message) ? $error_message : $dbconn->error;
//     // Execute the prepared statement
//     if (mysqli_stmt_execute(statement: $stmt)) {
//         $_SESSION["success"];
//         header('Location: '.$redirect);
//         exit();
//     } else {
//         // Error handling
//         $_SESSION['error'];
//         header('Location: '.$redirect);
//         exit();
//     }
//     // Close the prepared statement
//     mysqli_stmt_close($stmt);
// }

function executePreparedStmt($dbconn, $stmt, $redirect, $success_message = '', $error_message = '')
{
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Set success message
        $_SESSION["success"] = !empty($success_message) ? $success_message : "Action completed successfully!";
    } else {
        // Set error message
        $_SESSION["error"] = !empty($error_message) ? $error_message : mysqli_error($dbconn);
    }
    // Close the prepared statement
    mysqli_stmt_close($stmt);
    // Redirect user
    header('Location: ' . $redirect);
    exit();
}



// Token check
function token_check($token1, $token2, $redirect)
{
    if (strcmp($token1, $token2) != 0) {
        $_SESSION['error'] = "Server side scripting has occurred. Please try again later.";
        header('Location: ' . $redirect);
        exit();
    }
}

// Function to validate and sanitize a parameter
function sanitizeInput($input)
{
    // Remove leading and trailing spaces
    $input = trim($input);
    // Sanitize and escape for HTML
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

// Function to upload and optimize an image using Intervention Image
function upload_file($db_connection, $image, $image_type, $image_tmp_name, $redirect, $path)
{
    // Extract the file extension
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    // Define the allowed image extensions
    $allowed_extensions = ["png", "jpg", "jpeg", "jfif", 'pdf'];
    // Check if the file type is valid
    if (!in_array(strtolower($file_extension), $allowed_extensions) && !empty($image_type)) {
        $_SESSION["error"] = "The file type that has been uploaded is not valid";
        header("Location: $redirect");
        exit();
    }
    // Generate a unique filename
    $new_itemImage_name = md5(time()) . '_' . rand() . '.' . $file_extension;
    $target = $path . $new_itemImage_name;
    // Move the uploaded image
    if (move_uploaded_file($image_tmp_name, $target)) {
        return $new_itemImage_name;
    } else {
        $_SESSION["error"] = "Failed to upload the file because: " . $db_connection->error;
        header("Location: $redirect");
        exit();
    }
}
// Function to upload image
// function upload_file($db_connection,$image,$image_type,$image_tmp_name,$redirect,$path){
//     $filenames = $image ;
//     $arr_filenames = explode(".", $filenames);
//     $ext = end($arr_filenames);
//     $allowedExts = array("image/png", "image/PNG", "image/jpg", "image/JPG", "image/jpeg", "image/JPEG","image/jfif", "image/JFIF","application/pdf","application/PDF","application/msword","application/MSWORD");
//     $new_itemImage_name = md5(time()).'_'.rand().'.';
//     $target = $path.$new_itemImage_name.$ext;
//     if ((!in_array($image_type, $allowedExts)) and (!empty($image_type))) {
//         $_SESSION["error"] = "The file type that has been uploaded  is not valid";
//         header("Location: $redirect");
//         exit();
//     } else {
//         if (move_uploaded_file($image_tmp_name, $target)) {
//             return $itemImage = $new_itemImage_name.$ext;
//         } else {
//             $_SESSION["error"] = "Failed to upload the file because: " . $db_connection->error;
//             header("Location: $redirect");
//             exit();
//         }
//     }
// }

function generate_years_descending_from_current($numYears)
{
    $currentYear = date('Y');
    $startYear = $currentYear;
    $endYear = $currentYear - $numYears;
    return range($startYear, $endYear);
}

// Country codes select dropdown
function country_codes()
{
    return '<!-- country codes (ISO 3166) and Dial codes. -->
        <div class="form-group">
        <label class="font-weight-bold">Country Code<span class="text-danger"> (*Required)</span></label>
        <select class="custom-select2 form-control form-control-sm" id="country_code" name="country_code">
            <option data-countryCode="KE" value="254" selected>Kenya (+254)</option>
            <optgroup label="Other countries">
                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                <option data-countryCode="AO" value="244">Angola (+244)</option>
                <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                <option data-countryCode="AR" value="54">Argentina (+54)</option>
                <option data-countryCode="AM" value="374">Armenia (+374)</option>
                <option data-countryCode="AW" value="297">Aruba (+297)</option>
                <option data-countryCode="AU" value="61">Australia (+61)</option>
                <option data-countryCode="AT" value="43">Austria (+43)</option>
                <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                <option data-countryCode="BY" value="375">Belarus (+375)</option>
                <option data-countryCode="BE" value="32">Belgium (+32)</option>
                <option data-countryCode="BZ" value="501">Belize (+501)</option>
                <option data-countryCode="BJ" value="229">Benin (+229)</option>
                <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                <option data-countryCode="BW" value="267">Botswana (+267)</option>
                <option data-countryCode="BR" value="55">Brazil (+55)</option>
                <option data-countryCode="BN" value="673">Brunei (+673)</option>
                <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                <option data-countryCode="BI" value="257">Burundi (+257)</option>
                <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                <option data-countryCode="CA" value="1">Canada (+1)</option>
                <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                <option data-countryCode="CL" value="56">Chile (+56)</option>
                <option data-countryCode="CN" value="86">China (+86)</option>
                <option data-countryCode="CO" value="57">Colombia (+57)</option>
                <option data-countryCode="KM" value="269">Comoros (+269)</option>
                <option data-countryCode="CG" value="242">Congo (+242)</option>
                <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                <option data-countryCode="HR" value="385">Croatia (+385)</option>
                <option data-countryCode="CU" value="53">Cuba (+53)</option>
                <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                <option data-countryCode="DK" value="45">Denmark (+45)</option>
                <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                <option data-countryCode="EG" value="20">Egypt (+20)</option>
                <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                <option data-countryCode="EE" value="372">Estonia (+372)</option>
                <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                <option data-countryCode="FI" value="358">Finland (+358)</option>
                <option data-countryCode="FR" value="33">France (+33)</option>
                <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                <option data-countryCode="GA" value="241">Gabon (+241)</option>
                <option data-countryCode="GM" value="220">Gambia (+220)</option>
                <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                <option data-countryCode="DE" value="49">Germany (+49)</option>
                <option data-countryCode="GH" value="233">Ghana (+233)</option>
                <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                <option data-countryCode="GR" value="30">Greece (+30)</option>
                <option data-countryCode="GL" value="299">Greenland (+299)</option>
                <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                <option data-countryCode="GU" value="671">Guam (+671)</option>
                <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                <option data-countryCode="GN" value="224">Guinea (+224)</option>
                <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                <option data-countryCode="GY" value="592">Guyana (+592)</option>
                <option data-countryCode="HT" value="509">Haiti (+509)</option>
                <option data-countryCode="HN" value="504">Honduras (+504)</option>
                <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                <option data-countryCode="HU" value="36">Hungary (+36)</option>
                <option data-countryCode="IS" value="354">Iceland (+354)</option>
                <option data-countryCode="IN" value="91">India (+91)</option>
                <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                <option data-countryCode="IR" value="98">Iran (+98)</option>
                <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                <option data-countryCode="IE" value="353">Ireland (+353)</option>
                <option data-countryCode="IL" value="972">Israel (+972)</option>
                <option data-countryCode="IT" value="39">Italy (+39)</option>
                <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                <option data-countryCode="JP" value="81">Japan (+81)</option>
                <option data-countryCode="JO" value="962">Jordan (+962)</option>
                <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                <!-- <option data-countryCode="KE" value="254">Kenya (+254)</option> -->
                <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                <option data-countryCode="KP" value="850">Korea North (+850)</option>
                <option data-countryCode="KR" value="82">Korea South (+82)</option>
                <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                <option data-countryCode="LA" value="856">Laos (+856)</option>
                <option data-countryCode="LV" value="371">Latvia (+371)</option>
                <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                <option data-countryCode="LR" value="231">Liberia (+231)</option>
                <option data-countryCode="LY" value="218">Libya (+218)</option>
                <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                <option data-countryCode="MO" value="853">Macao (+853)</option>
                <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                <option data-countryCode="MW" value="265">Malawi (+265)</option>
                <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                <option data-countryCode="MV" value="960">Maldives (+960)</option>
                <option data-countryCode="ML" value="223">Mali (+223)</option>
                <option data-countryCode="MT" value="356">Malta (+356)</option>
                <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                <option data-countryCode="MX" value="52">Mexico (+52)</option>
                <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                <option data-countryCode="MD" value="373">Moldova (+373)</option>
                <option data-countryCode="MC" value="377">Monaco (+377)</option>
                <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                <option data-countryCode="MA" value="212">Morocco (+212)</option>
                <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                <option data-countryCode="NA" value="264">Namibia (+264)</option>
                <option data-countryCode="NR" value="674">Nauru (+674)</option>
                <option data-countryCode="NP" value="977">Nepal (+977)</option>
                <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                <option data-countryCode="NE" value="227">Niger (+227)</option>
                <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                <option data-countryCode="NU" value="683">Niue (+683)</option>
                <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                <option data-countryCode="NO" value="47">Norway (+47)</option>
                <option data-countryCode="OM" value="968">Oman (+968)</option>
                <option data-countryCode="PW" value="680">Palau (+680)</option>
                <option data-countryCode="PA" value="507">Panama (+507)</option>
                <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                <option data-countryCode="PE" value="51">Peru (+51)</option>
                <option data-countryCode="PH" value="63">Philippines (+63)</option>
                <option data-countryCode="PL" value="48">Poland (+48)</option>
                <option data-countryCode="PT" value="351">Portugal (+351)</option>
                <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                <option data-countryCode="QA" value="974">Qatar (+974)</option>
                <option data-countryCode="RE" value="262">Reunion (+262)</option>
                <option data-countryCode="RO" value="40">Romania (+40)</option>
                <option data-countryCode="RU" value="7">Russia (+7)</option>
                <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                <option data-countryCode="SM" value="378">San Marino (+378)</option>
                <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                <option data-countryCode="SN" value="221">Senegal (+221)</option>
                <option data-countryCode="CS" value="381">Serbia (+381)</option>
                <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                <option data-countryCode="SG" value="65">Singapore (+65)</option>
                <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                <option data-countryCode="SO" value="252">Somalia (+252)</option>
                <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                <option data-countryCode="ES" value="34">Spain (+34)</option>
                <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                <option data-countryCode="SD" value="249">Sudan (+249)</option>
                <option data-countryCode="SR" value="597">Suriname (+597)</option>
                <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                <option data-countryCode="SE" value="46">Sweden (+46)</option>
                <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                <option data-countryCode="SI" value="963">Syria (+963)</option>
                <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                <option data-countryCode="TH" value="66">Thailand (+66)</option>
                <option data-countryCode="TG" value="228">Togo (+228)</option>
                <option data-countryCode="TO" value="676">Tonga (+676)</option>
                <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                <option data-countryCode="TR" value="90">Turkey (+90)</option>
                <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                <option data-countryCode="UG" value="256">Uganda (+256)</option>
                <option data-countryCode="GB" value="44">UK (+44)</option>
                <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                <option data-countryCode="US" value="1">USA (+1)</option>
                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
            </optgroup>
        </select>
        </div>';
}
?>