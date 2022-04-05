 <div class="main-wrapper">
   <!-- ! Main nav -->
   <nav class="main-nav--bg">
     <div class="container main-nav">
       <div class="main-nav-start">

       </div>
       <div class="main-nav-end">
         <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
           <span class="sr-only">Toggle menu</span>
           <span class="icon menu-toggle--gray" aria-hidden="true"></span>
         </button>

         <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
           <span class="sr-only">Switch theme</span>
           <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
           <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
         </button>

         <div class="nav-user-wrapper">
           <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
             <span class="sr-only">My profile</span>
             <span class="nav-user-img">

               <picture>
                 <source srcset="assets/image/<?= $_SESSION['auth']['image'] ?>"><img src="assets/image/<?= $_SESSION['auth']['image'] ?>" alt="User name">
               </picture>
             </span>
           </button>
           <ul class="users-item-dropdown nav-user-dropdown dropdown">
             <li><a href="##">
                 <i data-feather="user" aria-hidden="true"></i>
                 <span><?= $_SESSION['auth']['fullname'] ?></span>
               </a></li>

             <li><a href="index.php?mod=auth&act=resetadmin">
                 <i data-feather="settings" aria-hidden="true"></i>
                 <span>Đổi mật khẩu</span>
               </a></li>

             <li><a class="danger" href="index.php?mod=auth&act=logout">
                 <i data-feather="log-out" aria-hidden="true"></i>
                 <span>Đăng xuất</span>
               </a></li>

           </ul>
         </div>

       </div>
     </div>
   </nav>