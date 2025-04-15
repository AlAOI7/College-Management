    <button id="menu-button">
        <i class="fa fa-bars"></i>
    </button>
    <div id="menu" class="menu">


        <div class="sidebar-header">
            <div class="sidebar-item">
                <a class="nav-link text-white" href="../student/student-index.php">
                    <i class="fa fa-home mr-2" aria-hidden="true"></i> الطالب

                </a>
            </div>
        </div>
        <ul id="sidebarnav" class=" flex-column ">
            <li class="nav-item">
                <a class="nav-link" href="../student/display-student.php">
                    <i class="fa fa-user mr-2" aria-hidden="true"></i> ملفي الشخصي
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../student/student-personal-information.php">
                    <i class="fa fa-info-circle mr-2" aria-hidden="true"></i>معلوماتي الشخصية
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../student/student-result.php">
                    <i class="fa fa-th-list mr-2" aria-hidden="true"></i> درجاتي
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../student/coursem.php">
                    <i class="fa fa-th-list mr-2" aria-hidden="true"></i> موادي
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../student/student-password.php">
                    <i class="fa fa-key mr-2" aria-hidden="true"></i> تغيير كلمة السر
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="logout.php">
                    <i class="fas fa-power-off fa-fw mr-2"></i>
                    تسجيل الخروج
                </a>
            </li>
        </ul>

    </div>
    <script>
// الحصول على عنصر الزر
const menuButton = document.getElementById('menu-button');

// الحصول على عنصر القائمة
const menu = document.getElementById('menu');

// إضافة مستمع للحدث عند النقر على الزر
menuButton.addEventListener('click', () => {
    // تبديل حالة عرض القائمة
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
});
const toggleBtn = document.querySelector(".show-btn");
const sidebar = document.querySelector(".sidebar");
toggleBtn.addEventListener("click", function() {
    sidebar.classList.toggle("show-sidebar");
});
    </script>

    <style>
.menu {
    display: none;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
    border-radius: 5px;
    z-index: 1;
}

.menu a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    color: #333;
}

.menu a:hover {
    background-color: #ff2;
}
    </style>