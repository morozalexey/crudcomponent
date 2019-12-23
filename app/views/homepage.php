<?php $this->layout('layout', ['title' => 'Comments']) ?>

<div class="col-md-12">
                     
	 <div class="card">
	    <div class="card-header"><h3>Комментарии</h3></div>

	    <div class="card-body">
	      <?= $messageSuccess ?>
		<?php foreach($comments as $comment):?>								  
	        <div class="media">	        	
	          <img src="<?= $comment['avatar'] ;?>" class="mr-3" alt="..." width="64" height="64"> 		
	          <div class="media-body">
	            <h5 class="mt-0"><?= $comment['name']?></h5> 								
	            <span><small><?= date("d/m/Y", strtotime($comment['dt_add']))?></small></span>								
	            <p><?= $comment['text']?></p>								
	          </div>
	        </div>	
		<?php endforeach; ?>	
		
	    </div>
	</div>                   

</div>
                
<div class="col-md-12" style="margin-top: 20px;">                        
    <div class="card">
        <div class="card-header"><h3>Оставить комментарий</h3></div>

        <div class="card-body">
            <form action="add-comment.php" method="post">                       
            <div class="alert alert-success" role="alert">Чтобы оставлять комментарии <a href="/login_page">авторизуйтесь</a> </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Имя</label>
                    <input name="name" class="form-control" id="exampleFormControlTextarea1" />
                    <p><?= $nameErrorMessage ?></p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Сообщение</label>
                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <p><?= $textErrorMessage ?></p>
                </div>
                <div class="btn btn-success">Отправить</div>                                
            </form>
        </div>
    </div>
</div>
