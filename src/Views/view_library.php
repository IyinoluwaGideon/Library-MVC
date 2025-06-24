
<table border="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($books)):  ?>
            <?php foreach ($books as $number => $book) : ?>
                <?php $book_id = $book->get_book_id() ?>
                <tr>
                    <td><?= $book_id ?></td>
                    <td><?= $book->get_title() ?></td>
                    <td><?= $book->get_genre() ?></td>
                    <td><?= $book->get_author() ?></td>
                    <td>
                        <?php if ($is_admin): ?>
                            <?php echo "<a href='edit-book.php?book_id=$book_id' class='small-round-button'>Edit Book</a>" ?>
                        <?php else: ?>
                            <?php echo "<a href='view-book-details.php?book_id=$book_id' class='small-round-button'>Borrow Book</a>" ?>
                            <?php echo "<a href='view-book-details.php?book_id=$book_id' class='small-round-button'>View Details</a>" ?>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No books within this library.</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>