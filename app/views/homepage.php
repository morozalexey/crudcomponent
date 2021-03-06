<?php $this->layout('layout', ['title' => 'Comments']) ?>

<div class="col-md-12">
                     
	 <div class="card">
	    <div class="card-header"><h3>Комментарии</h3></div>

	    <div class="card-body">	      
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
            <?php if (!$_SESSION['auth_logged_in']) :?> 
            <form action="" method="post">                                 
                <div class="alert alert-success" role="alert">Чтобы оставлять комментарии <a href="/login_page">авторизуйтесь</a> </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Имя</label>
                    <input name="name" class="form-control" id="exampleFormControlTextarea1" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Сообщение</label>
                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="btn btn-success">Отправить</div>                                
            </form>
            <?php else: ?>
            <form action="new_сomment" method="post">                               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Сообщение</label>
                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>               
                </div>
                <button type="submit" class="btn btn-success">Отправить</button>                                
            </form>
            <?php endif; ?>     
        </div>
    </div>
</div>
