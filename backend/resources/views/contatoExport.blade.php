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
		@foreach ($contato as $contatos)
		<tr>	 			
			<td>{{ $contatos->nome }}</td>
			<td>{{ $contatos->email }}</td>
			<td>{{ $contatos->user_id}}</td>
			<td>{{ $contatos->telefone }}</td>
			<td>{{ $contatos->created_at->format('d M Y  h:m:s' ) }}</td>
			<td>{{ $contatos->updated_at->format('d M Y  h:m:s') }}</td>
								
		</tr>
		@endforeach
	</tbody>
</table>

