<?php ob_start(); ?>

<div class="container">
    <h1>Create a new Quiz</h1>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
        </div>
    <?php endif; ?>
    
    <form action="/quiz/store" method="POST">
        <div class="form-group">
            <label for="title">Quiz Title *</label>
            <input type="text" name="title" id="title" class="form-control" required 
                   value="<?= isset($_SESSION['old']['title']) ? $_SESSION['old']['title'] : '' ?>">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"><?= isset($_SESSION['old']['description']) ? $_SESSION['old']['description'] : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Quiz</button>
            <a href="/quiz" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>