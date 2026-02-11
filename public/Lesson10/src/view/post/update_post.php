<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить новость - Районные новости</title>
    <link rel="stylesheet" href="/Lesson10/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar">
        <a href="index.php?action=view&id=<?= $post['id'] ?>" class="logo">
            <i class="fas fa-arrow-left"></i> Назад к новости
        </a>
        <div class="nav-links">
            <a href="index.php"><i class="fas fa-home"></i> Главная</a>
        </div>
    </nav>

    <div class="form-container fade-in">
        <h1 style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-edit" style="color: #667eea;"></i>
            Редактировать новость
        </h1>

        <form method="POST" action="index.php?action=update&id=<?= $post['id'] ?>">
            <div class="form-group">
                <label for="title">
                    <i class="fas fa-heading"></i> Заголовок
                </label>
                <input type="text" id="title" name="title"
                       value="<?= htmlspecialchars($post['title']) ?>" required>
            </div>

            <div class="form-group">
                <label for="content">
                    <i class="fas fa-align-left"></i> Содержание
                </label>
                <textarea id="content" name="content" required><?=
                    htmlspecialchars($post['content'])
                    ?></textarea>
            </div>

            <div class="form-actions">
                <a href="index.php?action=view&id=<?= $post['id'] ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Отмена
                </a>
                <button type="submit" class="btn">
                    <i class="fas fa-save"></i> Сохранить изменения
                </button>
            </div>
        </form>
    </div>

    <footer class="footer">
        <p>Обновляйте информацию, чтобы жители района были в курсе событий</p>
    </footer>
</div>
</body>
</html>
