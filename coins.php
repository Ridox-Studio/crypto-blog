<?php
    include 'header.php';
?>
<div style="padding:20px;position: fixed; width: 100vw; height: 80vh;background:var(--black-color);">
    <div class="coins-wrapper">
    <table>
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Name</th>
          <th scope="col">Symbol</th>
          <th scope="col">Rank</th>
          <th scope="col">Market Cap</th>
          <th scope="col">Price</th>
          <th scope="col">24h</th>
        </tr>
      </thead>
      <tbody id="data">
        <!-- <tr>
          <td>Bitcoin</td>
          <td>BTC</td>
          <td>$1,234,000,453</td>
          <td>$1,345</td>
          <td>-2.34%</td>
        </tr>
        <tr>
        <td>Bitcoin</td>
          <td>BTC</td>
          <td>$1,234,000,453</td>
          <td>$1,345</td>
          <td>-2.34%</td>
        </tr> -->
      </tbody>
    </table>
    </div>
</div>
<script src="app.js"></script>
<?php
    include 'footer.php';
?>