<p>
    <?php _e('К сожалению, судя по всему произошла ошибка получения секретного ключа от нашего сервиса.
    Если вы видите это сообщение в первый раз, попробуйте разрешить доступ еще раз:)', 'jumpout') ?>
</p>

<a class="button button-primary button-hero load-customize" href="<?php echo $api_url?>allow_access/?back_url=http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>">
	<?php _e('Попробовать еще раз!', 'jumpout') ?>
</a>

<!--
<p>
    <?php _e('Если же не в первый раз - обратитесь в техподдержку.', 'jumpout') ?>
</p>
-->

<p>
    <?php _e('Если же не в первый раз - просто вставьте код JumpOut ниже:', 'jumpout') ?>
</p>
<p>
	<form action="?page=jumpout&action=save_code" method="POST">
    	
    	<textarea name="code" placeholder="<?php _e('Код тут', 'jumpout') ?>" cols="60"></textarea>
    	<br />

    	<input type="submit" value="<?php _e('Сохранить!', 'jumpout') ?>" class="button button-primary load-customize" />
    </form>
</p>