<h1>Users</h1>
<a href="/users/create" class="btn btn-primary">Create User</a>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $id => $user) : ?>
      <tr>
        <td><?= $id ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>
          <a href="/users/edit/<?= $id ?>" class="btn btn-warning">Edit</a>
          <a href="/users/delete/<?= $id ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
