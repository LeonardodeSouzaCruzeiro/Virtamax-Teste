<table>		
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Telefone</th>
			<th>Foto</th>
			<th>Data de envio</th>
			<th>Data de modificação</th>
		</tr>
	</thead>
	<tbody>	
		<?php $__currentLoopData = $contato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contatos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>	 			
			<td><?php echo e($contatos->nome); ?></td>
			<td><?php echo e($contatos->email); ?></td>
			<td><?php echo e($contatos->user_id); ?></td>
			<td><?php echo e($contatos->telefone); ?></td>
			<td><?php echo e($contatos->created_at->format('d M Y  h:m:s' )); ?></td>
			<td><?php echo e($contatos->updated_at->format('d M Y  h:m:s')); ?></td>
								
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<?php /**PATH C:\Users\arqui\Desktop\laravel\backend\resources\views/contatoExport.blade.php ENDPATH**/ ?>