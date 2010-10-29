<h1>I store items List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Category</th>
      <th>Brand</th>
      <th>Name</th>
      <th>Image</th>
      <th>Description</th>
      <th>Unit cost</th>
      <th>Weight</th>
      <th>Is activated</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($i_store_items as $i_store_item): ?>
    <tr>
      <td><a href="<?php echo url_for('item/show?id='.$i_store_item->getId()) ?>"><?php echo $i_store_item->getId() ?></a></td>
      <td><?php echo $i_store_item->getCategoryId() ?></td>
      <td><?php echo $i_store_item->getBrandId() ?></td>
      <td><?php echo $i_store_item->getName() ?></td>
      <td><?php echo $i_store_item->getImage() ?></td>
      <td><?php echo $i_store_item->getDescription() ?></td>
      <td><?php echo $i_store_item->getUnitCost() ?></td>
      <td><?php echo $i_store_item->getWeight() ?></td>
      <td><?php echo $i_store_item->getIsActivated() ?></td>
      <td><?php echo $i_store_item->getCreatedAt() ?></td>
      <td><?php echo $i_store_item->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('item/new') ?>">New</a>
