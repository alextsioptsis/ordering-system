<?php
// Λήψη δεδομένων
$zymi = $_POST["zimi"];

$ylika = isset($_POST["ylika"]) ? $_POST["ylika"] : [];
$pl = count($ylika);

$kostos = 0;
$kostosz = 0;

echo "Γεια, για ζύμη διάλεξες: <strong>$zymi</strong> <br>";

if ($zymi == "fill") { 
    $kostosz = 3;
} else {
    $kostosz = 1;
}

echo "Τα υλικά σου είναι: <br>";
for ($i = 0; $i < $pl; $i++) {
    echo "- " . $ylika[$i] . "<br>";
    $kostos++;
}


$synolo = $kostosz + $kostos;
echo "<br><strong>Συνολικό κόστος = " . $synolo . "€</strong>";
?>

<?php
// Λήψη δεδομένων
$zymi  = $_POST["zimi"] ?? "";
$ylika = $_POST["ylika"] ?? [];
$pl    = count($ylika);

// Υπολογισμός κόστους
$kostosz = ($zymi === "fill") ? 3 : 1;
$kostosYlikon = $pl; // 1€ ανά υλικό
$synolo = $kostosz + $kostosYlikon;
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Παραγγελία Πίτσας</title>
  <style>
    :root {
      --bg1: #ffecd2;
      --bg2: #fcb69f;
      --card: #ffffff;
      --text: #2d2d2d;
      --accent: #ff6b35;
      --muted: #6b7280;
      --ok: #16a34a;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      min-height: 100vh;
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
      color: var(--text);
      background: linear-gradient(135deg, var(--bg1), var(--bg2));
      display: grid;
      place-items: center;
      padding: 24px;
    }

    .card {
      width: min(560px, 100%);
      background: var(--card);
      border-radius: 18px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
      overflow: hidden;
    }

    .header {
      padding: 18px 22px;
      background: var(--accent);
      color: white;
      font-size: 1.2rem;
      font-weight: 700;
      letter-spacing: .3px;
    }

    .content {
      padding: 22px;
    }

    .row {
      margin: 0 0 14px;
      line-height: 1.55;
    }

    .label {
      color: var(--muted);
      font-weight: 600;
      display: block;
      margin-bottom: 6px;
    }

    .value strong {
      color: var(--accent);
    }

    ul {
      margin: 0;
      padding-left: 20px;
    }

    li {
      margin: 4px 0;
    }

    .empty {
      color: var(--muted);
      font-style: italic;
    }

    .total {
      margin-top: 18px;
      padding: 14px 16px;
      border-radius: 12px;
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
      color: var(--ok);
      font-weight: 800;
      font-size: 1.05rem;
    }
  </style>
</head>
<body>
  <section class="card">
    <div class="header">🍕 Η Παραγγελία σου</div>

    <div class="content">
      <p class="row value">
        <span class="label">Ζύμη που επέλεξες</span>
        <strong><?= htmlspecialchars($zymi) ?></strong>
      </p>

      <div class="row">
        <span class="label">Υλικά</span>
        <?php if ($pl > 0): ?>
          <ul>
            <?php foreach ($ylika as $yliko): ?>
              <li><?= htmlspecialchars($yliko) ?></li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="empty">Δεν επέλεξες επιπλέον υλικά.</p>
        <?php endif; ?>
      </div>

      <div class="total">
        Συνολικό κόστος: <?= $synolo ?>€
      </div>
    </div>
  </section>
</body>
</html>