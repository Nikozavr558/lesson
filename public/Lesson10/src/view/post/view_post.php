<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?> - Районные новости</title>
    <link rel="stylesheet" href="/Lesson10/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="container">
    <!-- Навигация -->
    <nav class="navbar">
        <a href="lesson10.php" class="logo">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
        <div class="nav-links">
            <a href="lesson10.php"><i class="fas fa-home"></i> Главная</a>
        </div>
    </nav>

    <!-- Детали поста -->
    <article class="post-detail fade-in">
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1.5rem;">
            <div>
                <h1 style="font-size: 2rem; margin-bottom: 0.5rem;"><?= htmlspecialchars($post['title']) ?></h1>
                <div style="display: flex; align-items: center; gap: 1rem; color: #718096;">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-user"></i>
                        <span>Автор: <?= $post['username'] ?></span>
                    </div>
                    <?php if (isset($post['created_at'])): ?>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-calendar"></i>
                            <span><?= date('d.m.Y H:i', strtotime($post['created_at'])) ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div style="display: flex; gap: 0.5rem;">
                <a href="lesson10.php?action=update&id=<?= $post['id'] ?>" class="btn btn-secondary">
                    <i class="fas fa-edit"></i> Изменить
                </a>
                <a href="lesson10.php?action=delete&id=<?= $post['id'] ?>"
                   onclick="return confirm('Удалить эту новость?')"
                   class="btn btn-danger">
                    <i class="fas fa-trash"></i> Удалить
                </a>
            </div>
        </div>

        <div class="post-body">
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </div>

        <div style="border-top: 1px solid #e2e8f0; padding-top: 1.5rem;">
            <a href="lesson10.php" class="btn">
                <i class="fas fa-arrow-left"></i> Вернуться к новостям
            </a>
        </div>
    </article>

    <footer class="footer">
        <p>© <?= date('Y') ?> Новостная лента района</p>
    </footer>
</div>
</body>
</html>