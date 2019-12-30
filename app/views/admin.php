<?php $this->layout('layout', ['title' => 'Admin Page']) ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>Админ панель</h3></div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Дата</th>
                        <th>Комментарий</th>
                        <th>Действия</th>
                    </tr>
                </thead>

                <tbody>
				<?php foreach($comments as $comment):?>
				<?php d($comment) ?>
                    <tr>										
                        <td>
                            <img src="<?= $comment['avatar'] ?>" alt="" class="img-fluid" width="64" height="64">
                        </td>
                        <td><?= $comment['name'] ?></td>
                        <td><?= $comment['dt_add'] ?></td>
                        <td><?= $comment['text'] ?></td>
                        <td>	
							<?php if ($comment['hide'] != 1) : ?>
                            <a href="/show?id=<?= $comment['id'] ?>" class="btn btn-success">Разрешить</a>							
							<?php else : ?>
                            <a href="/hide?id=<?= $comment['id'] ?>" class="btn btn-warning">Запретить</a>
							<?php endif ; ?>
                            <a href="/delete?id=<?= $comment['id'] ?>" onclick="return confirm('are you sure?')" class="btn btn-danger">Удалить</a>
                        </td>											
                    </tr>
				<?php endforeach; ?>									
				
				
                </tbody>
            </table>
        </div>
    </div>
</div>