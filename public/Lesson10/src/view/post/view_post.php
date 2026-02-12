<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?> - Районные новости</title>
    <link rel="stylesheet" href="/Lesson10/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Стили для комментариев */
        .comments-section {
            margin-top: 40px;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #edf2f7;
        }

        .comments-title {
            font-size: 24px;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comments-count {
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .comment-form {
            background: #f7fafc;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
            transition: all 0.3s;
        }

        .comment-form textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .comment-form button {
            margin-top: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .comment-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .comments-list {
            list-style: none;
        }

        .comment-item {
            padding: 20px;
            border-bottom: 1px solid #edf2f7;
            transition: background 0.3s;
        }

        .comment-item:hover {
            background: #f8fafc;
        }

        .comment-item:last-child {
            border-bottom: none;
        }

        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .comment-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .comment-info {
            flex: 1;
        }

        .comment-author {
            font-weight: 700;
            color: #2d3748;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .comment-date {
            color: #a0aec0;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .comment-content {
            color: #4a5568;
            line-height: 1.7;
            font-size: 16px;
            margin-left: 60px;
            padding: 10px 15px;
            background: #f8fafc;
            border-radius: 12px;
            white-space: pre-wrap;
        }

        .empty-comments {
            text-align: center;
            padding: 50px 20px;
            color: #a0aec0;
        }

        .empty-comments i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #cbd5e0;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #c6f6d5;
            color: #22543d;
            border: 1px solid #9ae6b4;
        }

        .alert-error {
            background: #fed7d7;
            color: #742a2a;
            border: 1px solid #fc8181;
        }

        .login-to-comment {
            background: #fefcbf;
            color: #744210;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-to-comment a {
            color: #744210;
            font-weight: 700;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <?php $user = $_SESSION['user'] ?? null; ?>

    <!-- Навигация -->
    <nav class="navbar">
        <a href="index.php" class="logo">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
        <div class="nav-links">
            <a href="index.php"><i class="fas fa-home"></i> Главная</a>
            <?php if ($user): ?>
                <a href="index.php?action=create" class="btn">
                    <i class="fas fa-plus"></i> Создать пост
                </a>
            <?php else: ?>
                <a href="index.php?action=login" class="btn">Войти</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Информация о пользователе -->
    <?php if ($user): ?>
        <div style="background: white; padding: 1rem; border-radius: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <p style="margin: 0;">
                <i class="fas fa-user-circle"></i>
                Вы вошли как <strong><?= htmlspecialchars($user['username']) ?></strong>
            </p>
            <div>
                <a href="index.php?action=profile" style="margin-right: 15px;">Профиль</a>
                <a href="index.php?action=logout" style="color: #e53e3e;">Выйти</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Сообщения об успехе/ошибке -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?= htmlspecialchars($_SESSION['success']) ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <?= htmlspecialchars($_SESSION['error']) ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <!-- Детали поста -->
    <article class="post-detail fade-in">
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1.5rem;">
            <div>
                <h1 style="font-size: 2rem; margin-bottom: 0.5rem;"><?= htmlspecialchars($post['title']) ?></h1>
                <div style="display: flex; align-items: center; gap: 1rem; color: #718096;">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-user"></i>
                        <span>Автор: <?= htmlspecialchars($post['username'] ?? 'Неизвестен') ?></span>
                    </div>
                    <?php if (isset($post['created_at'])): ?>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-calendar"></i>
                            <span><?= date('d.m.Y H:i', strtotime($post['created_at'])) ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($user && $user['id'] == $post['user_id']): ?>
                <div style="display: flex; gap: 0.5rem;">
                    <a href="index.php?action=update&id=<?= $post['id'] ?>" class="btn btn-secondary">
                        <i class="fas fa-edit"></i> Изменить
                    </a>
                    <a href="index.php?action=delete&id=<?= $post['id'] ?>"
                       onclick="return confirm('Удалить эту новость?')"
                       class="btn btn-danger">
                        <i class="fas fa-trash"></i> Удалить
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="post-body">
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </div>

        <div style="border-top: 1px solid #e2e8f0; padding-top: 1.5rem;">
            <a href="index.php" class="btn">
                <i class="fas fa-arrow-left"></i> Вернуться к новостям
            </a>
        </div>
    </article>

    <!-- Секция комментариев -->
    <div class="comments-section fade-in">
        <div class="comments-header">
            <h2 class="comments-title">
                <i class="fas fa-comments"></i>
                Комментарии
            </h2>
            <span class="comments-count"><?= count($comments ?? []) ?></span>
        </div>

        <!-- Форма добавления комментария -->
        <?php if ($user): ?>
            <div class="comment-form">
                <form method="POST" action="index.php?action=view&id=<?= $post['id'] ?>">
                    <textarea
                            name="content"
                            placeholder="Напишите ваш комментарий..."
                            required
                    ></textarea>
                    <button type="submit" name="add_comment">
                        <i class="fas fa-paper-plane"></i> Отправить комментарий
                    </button>
                </form>
            </div>
        <?php else: ?>
            <div class="login-to-comment">
                <i class="fas fa-lock"></i>
                <a href="index.php?action=login">Войдите</a>, чтобы оставить комментарий
            </div>
        <?php endif; ?>

        <!-- Список комментариев -->
        <?php if (empty($comments)): ?>
            <div class="empty-comments">
                <i class="far fa-comment-dots"></i>
                <h3 style="margin-bottom: 10px;">Пока нет комментариев</h3>
                <p>Будьте первым, кто поделится своим мнением!</p>
            </div>
        <?php else: ?>
            <ul class="comments-list">
                <?php foreach ($comments as $comment): ?>
                    <li class="comment-item">
                        <div class="comment-header">
                            <div class="comment-avatar">
                                <?= mb_substr(htmlspecialchars($comment['username'] ?? 'А'), 0, 1) ?>
                            </div>
                            <div class="comment-info">
                                <div class="comment-author">
                                    <?= htmlspecialchars($comment['username'] ?? 'Аноним') ?>
                                </div>
                                <div class="comment-date">
                                    <i class="far fa-clock"></i>
                                    <?= date('d.m.Y H:i', strtotime($comment['created_at'] ?? 'now')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="comment-content">
                            <?= nl2br(htmlspecialchars($comment['content'] ?? '')) ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <footer class="footer">
        <p>© <?= date('Y') ?> Новостная лента района</p>
    </footer>
</div>
</body>
</html>