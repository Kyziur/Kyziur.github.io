<footer class="footer">
      <div class="container">
        <span class="text-muted">No co stopki nie widziałeś? 
        <?php
$file= @fopen("count.dat", "c+");
fscanf($file, "%d", $count);
$count++;
rewind($file);
fputs($file, $count);
fclose($file);

echo $count;
?> </span>
      </div>
</footer>