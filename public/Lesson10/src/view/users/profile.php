<?php
// Проверяем, есть ли данные пользователя
if (!isset($user)) {
    die('Ошибка: данные пользователя не загружены');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль - <?= htmlspecialchars($user['username']) ?></title>
    <style>
        body {
            font-family: Arial;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-header {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }

        .post-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<h1>Профиль пользователя</h1>

<div class="profile-header">
    <h2><?= htmlspecialchars($user['username']) ?></h2>
    <p><strong>ID:</strong> <?= $user['id'] ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? 'Не указан') ?></p>
    <p><strong>Зарегистрирован:</strong> <?= $user['created_at'] ?? 'Неизвестно' ?></p>
</div>

<h3>Мои посты (<?= count($posts ?? []) ?>):</h3>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="post-item">
            <h4>
                <a href="/view_post.php?id=<?= $post['id'] ?>">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
            </h4>
            <p><?= nl2br(htmlspecialchars(substr($post['content'], 0, 200))) ?>...</p>
            <small>Создан: <?= $post['created_at'] ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>У вас еще нет постов. <a href="/create_post.php">Создать первый пост</a></p>
<?php endif; ?>

<hr>
<a href="/enter_point.php">← На главную</a> |
<a href="/logout.php">Выйти</a>
</body>
</html>
