<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $i_store_item->getId() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $i_store_item->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Brand:</th>
      <td><?php echo $i_store_item->getBrandId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $i_store_item->getName() ?></td>
    </tr>
    <tr>
      <th>Image:</th>
      <td><?php echo $i_store_item->getImage() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $i_store_item->getDescription() ?></td>
    </tr>
    <tr>
      <th>Unit cost:</th>
      <td><?php echo $i_store_item->getUnitCost() ?></td>
    </tr>
    <tr>
      <th>Weight:</th>
      <td><?php echo $i_store_item->getWeight() ?></td>
    </tr>
    <tr>
      <th>Is activated:</th>
      <td><?php echo $i_store_item->getIsActivated() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $i_store_item->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $i_store_item->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('item/edit?id='.$i_store_item->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('item/index') ?>">List</a>
