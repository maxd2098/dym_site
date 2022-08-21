<div class="sidebar col-lg-3 col-12">
    <div class="section topics">
        <h3>Категории</h3>
        <ul>
            <?php if(isset($_SESSION['email'])): ?>
                <li>
                    <a href="<?=BASE_URL . 'memberships.php'?>">Купить абонемент</a>
                </li>
                <li>
                    <a href="<?=BASE_URL . 'trainers.php'?>">Выбрать тренера</a>
                </li>
                <li>
                    <a href="<?=BASE_URL . 'support.php'?>">Тех. поддержка</a>
                </li>
            <?php endif; ?>
            <?php if($_SESSION['status'] == 2 || $_SESSION['status'] == 3): ?>
                <li>
                    <a href="<?=BASE_URL . 'admin/admin.php'?>">Админ. панель</a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?=BASE_URL . 'programms.php'?>">Программы тренировок</a>
            </li>
        </ul>
    </div>
    <h4 class="title-search">Поиск по сайту</h4>
    <form class="d-flex sidebar-search" role="search">
        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn" type="submit">Поиск</button>
    </form>
</div>
