<section class="member-link">
<div class="container-section">
    <div class="title">
    <h1>Member Area</h1>
    <p>Hayde Bismillah dulu!</p>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <th class="text-center">#</th>
                <th>Image</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th scope="row" class="text-center"><?= $i++; ?></th>
                    <td class="text-center">
                        <img src="image/<?= $user['image']; ?>" alt="image" width="50" height="50" >
                    </td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $user['id']; ?>"  class="edit" id="edit-link"><img src="img/edit.svg" alt="edit" width="60" ></a>
                        <a href="delete.php?id=<?= $user['id']; ?>"  class="delete" onclick="return confirm('Anda Yakin?');"><img src="img/delete.svg" alt="delete" width="60"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</section>
