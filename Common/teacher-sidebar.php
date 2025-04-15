	<div class="row w-100">
	    <button class="show-btn button-show ml-auto">
	        <i class="fa fa-bars py-1" aria-hidden="true"></i>
	    </button>
	</div>
	<nav id="sidebarMenu" class="">
	    <div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
	        <div class="sidebar-header">
	            <a class="nav-link text-white" href="../teacher/teacher-index.php">
	                <span class="home"></span>
	                <i class="fa fa-home mr-2" aria-hidden="true"></i> لوحة التحكم
	            </a>
	        </div>
	        <ul class="nav flex-column">
	            <li class="nav-item">
	                <a class="nav-link" href="../teacher/display-teacher.php">
	                    <span data-feather="file"></span>
	                    <i class="fa fa-user mr-2" aria-hidden="true"></i>الملف الشخصي
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../teacher/teacher-personal-information.php">
	                    <span data-feather="file"></span>
	                    <i class="fa fa-info-circle mr-2" aria-hidden="true"></i> المعلومات الشخصية
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../teacher/teacher-courses.php">
	                    <span data-feather="shopping-cart"></span>
	                    <i class="fa fa-address-book mr-2" aria-hidden="true"></i>المواد الدراسية
	                </a>
	            </li>

	            <li class="nav-item">
	                <a class="nav-link" href="../teacher/result.php">
	                    <span data-feather="users"></span>
	                    <i class="fa fa-users mr-2" aria-hidden="true"></i>درجات الطلاب
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../teacher/teacher-password.php">
	                    <span data-feather="bar-chart-2"></span>
	                    <i class="fa fa-key mr-2" aria-hidden="true"></i> تغييركلمة المرور
	                </a>
	            </li>
	            <li>
	                <a class="dropdown-item" href="logout.php">
	                    <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
	                    تسجيل الخروج
	                </a>
	            </li>
	        </ul>
	    </div>
	</nav>

	<script>
const toggleBtn = document.querySelector(".show-btn");
const sidebar = document.querySelector(".sidebar");
// undefined
toggleBtn.addEventListener("click", function() {
    sidebar.classList.toggle("show-sidebar");
});
	</script>