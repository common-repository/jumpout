<?php if (TRUE === $data['first_not_empty_import']): ?>
    <div class="updated">
        <p>
            <?php _e('Отлично! Код установлен на ваш сайт, можете проверить работают ли джампауты.', 'jumpout') ?>
        </p>
        <p>
            <?php _e('Чтобы обновить список попапов, нажмите кнопку "Синхронизировать" сверху.', 'jumpout') ?>
        </p>
    </div>
<?php endif ?>

<?php if (0 != count($data['list'])):?>

    <div class="updated">
        <p>
            <?php _e('Отлично! Код установлен на ваш сайт, можете проверить работают ли джампауты.', 'jumpout') ?>
        </p>
        <p>
            <?php _e('Пока здесь больше ничего нет, но если есть идеи, что показывать - пишите:)', 'jumpout') ?>
        </p>
    </div>

<?php elseif (NULL === $data['session_token'] || TRUE !== $data['token_is_working']):?>

    <div class="wrap about-wrap">

        <style>.top_plugin_menu { display: none; }</style>

        <h1><?php _e('Добро пожаловать в плагин JumpOut\'а!', 'jumpout') ?></h1>

        <div class="about-text">
            <?php _e('Первое, что нам нужно сделать - разрешить доступ плагину к вашему аккаунту с попапами.
            Чтобы это сделать, просто нажмите на кнопку ниже:', 'jumpout') ?>
            <br /><br />

            <a class="button button-primary button-hero load-customize" href="<?php echo $api_url?>allow_access/?back_url=http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>">
                <?php _e('Начать использование!', 'jumpout') ?>
            </a>
        </div>

    </div>

<?php else:?>

    <div class="wrap about-wrap">

        <div class="about-text">
            <?php _e('Судя по всему, вы еще не создавали попапов. Что ж, пришло время это сделать! 
            Нажмите на кнопку "Новый попап" сверху или под этими строками:', 'jumpout') ?>
            <br /><br />

            <a class="button button-primary button-hero load-customize" href="http://jumpout.makedreamprofits.ru/#add_new" target="_blank">
                <?php _e('Создать первый попап!', 'jumpout') ?>
            </a>

            <br /><br />
            <?php _e('После того, как добавите, нажмите на кнопку сверху "Синхронизировать"', 'jumpout') ?>.

        </div>

    </div>


<?php endif?>
