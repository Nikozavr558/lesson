<?php

//session_start();

$userId = $_SESSION['user_id'] ?? null;

if ($userId): ?>

    <p>Вы вошли как пользователь #<?= $userId ?></p>
    <a href="lesson10.php?action=profile">Профиль</a> |
    <a href="lesson10.php?action=logout">Выйти</a>
<?php else: ?>
    <a href="lesson10.php?action=login">Войти</a>
    <a href="lesson10.php?action=register">Регистрация</a>
    <a href="lesson10.php?action=logout">Выйти</a>
<?php endif; ?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новостная лента нашего района</title>
    <link rel="stylesheet" href="/Lesson10/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="container">
    <!-- Шапка -->
    <header class="header fade-in">
        <h1><i class="fas fa-newspaper"></i>Новостная лента нашего района</h1>
        <p>Самые свежие новости и
            события. Такого вы еще не читали</p>
    </header>

    <!-- Навигация -->
    <nav class="navbar">
        <a href="lesson10.php" class="logo">Новости</a>
        <div class="nav-links">
            <a href="lesson10.php"><i class="fas fa-home"></i> Главная</a>
            <a href="lesson10.php?action=create" class="btn">
                <i class="fas fa-plus"></i> Создать пост
            </a>
        </div>
    </nav>

    <!-- Сетка постов -->
    <?php if (empty($posts)): ?>
        <div class="no-posts fade-in">
            <div style="text-align: center; padding: 4rem;">
                <i class="fas fa-newspaper" style="font-size: 4rem; color: #cbd5e0; margin-bottom: 1rem;"></i>
                <h2 style="color: #718096;">Пока нет новостей</h2>
                <p style="color: #a0aec0;">Будьте первым, кто поделится новостью!</p>
                <a href="lesson10.php?action=create" class="btn" style="margin-top: 1rem;">
                    <i class="fas fa-plus"></i> Создать первую новость
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="posts-grid fade-in">
            <?php foreach ($posts as $row): ?>
                <article class="post-card">
                    <div class="post-image">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title"><?= htmlspecialchars($row['title']) ?></h3>
                        <p class="post-excerpt">
                            <?= mb_substr(strip_tags(htmlspecialchars($row['content'])), 0, 100) ?>...
                        </p>
                        <div class="post-meta">
                            <div class="author">
                                <div class="author-avatar">
                                    <?= mb_substr(htmlspecialchars($row['username']), 0, 1) ?>
                                </div>
                                <span><?= htmlspecialchars($row['username']) ?></span>
                            </div>
                            <div class="post-actions">
                                <a href="lesson10.php?action=view&id=<?= $row['id'] ?>"
                                   class="btn" style="padding: 0.4rem 0.8rem;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="lesson10.php?action=update&id=<?= $row['id'] ?>"
                                   class="btn btn-secondary" style="padding: 0.4rem 0.8rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="lesson10.php?action=delete&id=<?= $row['id'] ?>"
                                   onclick="return confirm('Удалить эту новость?')"
                                   class="btn btn-danger" style="padding: 0.4rem 0.8rem;">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Футер -->
    <footer class="footer">
        <p>© <?= date('Y') ?> Новостная лента района. Все права защищены.</p>
        <p style="margin-top: 0.5rem; font-size: 0.9rem;">
            <i class="fas fa-heart" style="color: #861616;"></i>
            Сделано с заботой о нашем районе
        </p>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.post-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>
</body>
</html>