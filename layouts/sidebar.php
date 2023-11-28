<?php

$role=$_SESSION["sta_teresa"]["role"];

?>

<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index">Dashboard </a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Burial Contract <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="burial_contract?action=new">Add New</a></li>
                <li><a href="burial_contract?action=list">List</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Statement of Account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
               <?php $guarantors = query("select * from guarantors");
               foreach($guarantors as $g):?>
                  <li><a href="soa?action=list&id=<?php echo($g["tbl_id"]); ?>"><?php echo($g["guarantor"]); ?></a></li>
               <?php endforeach; ?>
              </ul>
            </li>
          
            <!-- <li><a href="static" target="_blank">Website </a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="reports_page?action=sales_report">Sales Revenue Report</a></li>
                <li><a href="reports_page?action=casket_report">Casket Sold Report</a></li>
                <li><a href="reports_page?action=deceased_report">List of Deceased Report</a></li>
                <li><a href="reports_page?action=collectibles_report">Collectibles Report</a></li>
                <li><a href="payroll?action=list">Payroll</a></li>
              </ul>
            </li>
            <?php if($role == "admin"): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilities <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="caskets?action=list">Caskets</a></li>
                <li><a href="chapels?action=list">Chapels</a></li>
                <li><a href="announcements?action=list">Announcements</a></li>
                <li><a href="guarantors?action=list">Guarantors</a></li>
                <li><a href="employees?action=list">Employees</a></li>
                <li><a href="branch?action=list">Branch</a></li>
                <li><a href="plan?action=list">Plan</a></li>
                <li><a href="partners?action=list">Partners</a></li>
                <li><a href="users">Users</a></li>
               
              </ul>
            </li>

            <?php endif; ?>


          </ul>
        </div>