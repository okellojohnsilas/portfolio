<div class="left-side-bar">
    <div class="brand-logo">
        <a class="text-center font-weight-bold" href="<?php print base_url().'admin/'?>">ADMIN PANEL</a>
        <div class="close-sidebar" data-toggle="left-sidebar-close"></div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a href="<?php print base_url().'admin/'?>" class="dropdown-toggle no-arrow">
                        <span class="micon fas fa-chart-bar"> </span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="border-top border-bottom">
                    <div class="sidebar-small-cap py-2">Website Information</div>
                </li>
                <li>
                    <a class="dropdown-toggle no-arrow" href="<?php print base_url().'admin/site/home'?>"> <span
                            class="micon fas fa-chart-bar"> </span><span class="mtext"> Home Page</span></a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fas fa-circle-info"></span><span class="mtext">About Page</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php print base_url().'admin/site/about'?>">About Text</a></li>
                        <li><a href="<?php print base_url().'admin/site/specialities'?>">Specialities</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fas fa-folder-tree"></span><span class="mtext">Portfolio Page</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php print base_url().'admin/projects/categories'?>">Project Categories</a></li>
                        <li><a href="<?php print base_url().'admin/projects/projects'?>">Projects</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fas fa-headset"></span><span class="mtext">Contact Page</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php print base_url().'admin/feedback/form_submissions'?>">Form Submissions</a>
                        </li>
                        <li><a href="<?php print base_url().'admin/feedback'?>">Contact Information</a></li>
                    </ul>
                </li>
                <li class="border-top border-bottom">
                    <div class="sidebar-small-cap py-2">Others</div>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fas fa-file-invoice-dollar"></span><span class="mtext">Invoices</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php print base_url().'admin/invoices/send_invoice'?>">Send Invoice</a></li>
                        <li><a href="<?php print base_url().'admin/incoices/invoice_list'?>">Invoices</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fas fa-server"></span><span class="mtext">Logs</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php print base_url().'admin/logs/projects'?>">Projects</a></li>
                        <li><a href="<?php print base_url().'admin/incoices/categories'?>">Project Categories</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>