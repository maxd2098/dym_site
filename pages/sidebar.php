<div class="sidebar col-lg-3 col-12">
    <div class="section topics">
        <h3>Категории</h3>
        <ul>
            <?php if(isset($_SESSION['status'])): ?>
                <?php if($_SESSION['status'] == 2 || $_SESSION['status'] == 3): ?>
                    <li>
                        <a href="<?=BASE_URL . 'admin/admin.php'?>">Админ. панель</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
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
            <li>
                <a href="<?=BASE_URL . 'programms.php'?>">Программы тренировок</a>
            </li>
        </ul>
    </div>
    <h4 class="title-search">Поиск по сайту</h4>
    <form class="sidebar-search" action="<?=BASE_URL . 'search.php'?>" method="post">
        <div class="d-flex">
            <input name="search" value="<?=isset($search) ? $search : ''; ?>" class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
            <button name="button_search" class="btn" type="submit">Поиск</button>
        </div>
        <select name="category" class="form-select" aria-label="Пример выбора по умолчанию">
            <option value="trainers" <?=isset($category) && $category == 'trainers' ? 'selected' : ''; ?>>По тренерам</option>
            <option value="programs" <?=isset($category) && $category == 'programs' ? 'selected' : ''; ?>>По программам</option>
            <option value="forum" <?=isset($category) && $category == 'forum' ? 'selected' : ''; ?>>По форуму</option>
        </select>
    </form>
</div>
