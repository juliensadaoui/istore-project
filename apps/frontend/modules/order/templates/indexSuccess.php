<h1>I store orders List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Credit card</th>
      <th>Address</th>
      <th>Date</th>
      <th>Payment</th>
      <th>Is validated</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($i_store_orders as $i_store_order): ?>
    <tr>
      <td><a href="<?php echo url_for('order/show?id='.$i_store_order->getId()) ?>"><?php echo $i_store_order->getId() ?></a></td>
      <td><?php echo $i_store_order->getCreditCardId() ?></td>
      <td><?php echo $i_store_order->getAddressId() ?></td>
      <td><?php echo $i_store_order->getDate() ?></td>
      <td><?php echo $i_store_order->getPayment() ?></td>
      <td><?php echo $i_store_order->getIsValidated() ?></td>
      <td><?php echo $i_store_order->getCreatedAt() ?></td>
      <td><?php echo $i_store_order->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('order/new') ?>">New</a>
