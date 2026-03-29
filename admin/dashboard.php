<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

require_once '../backend/db.php';
$leads = get_all_leads();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Dashboard | Crooksec Technology</title>
    <style>
        body { background: #0a0b10; color: #fff; font-family: 'Inter', sans-serif; margin: 0; padding: 2rem; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 1rem;}
        h2 { margin: 0; color: #06b6d4; }
        a.btn { color: white; text-decoration: none; background: #ef4444; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 500; font-size: 0.9rem;}
        .table-container { background: rgba(255,255,255,0.02); border-radius: 1rem; border: 1px solid rgba(255,255,255,0.05); overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 800px; }
        th, td { padding: 1rem 1.5rem; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.05); }
        th { background: rgba(255,255,255,0.05); font-weight: 600; color: #9ca3af; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.05em; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(255,255,255,0.02); }
        .details { font-size: 0.9rem; color: #9ca3af; max-width: 300px; line-height: 1.5; }
        .tag { display: inline-block; background: rgba(79, 70, 229, 0.2); color: #818cf8; padding: 0.2rem 0.6rem; border-radius: 1rem; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.3rem;}
    </style>
</head>
<body>
    <div class="header">
        <h2>Lead Management Dashboard</h2>
        <a href="logout.php" class="btn">Secure Logout</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Received At</th>
                    <th>Client Profile</th>
                    <th>Contact Info</th>
                    <th>Project Specs</th>
                    <th>Message Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leads as $lead): ?>
                <tr>
                    <td style="white-space: nowrap; color: #9ca3af; font-size: 0.9rem;"><?= htmlspecialchars(date('M j, Y g:i A', strtotime($lead['created_at']))) ?></td>
                    <td>
                        <strong><?= htmlspecialchars($lead['name']) ?></strong><br>
                        <span style="font-size: 0.85rem; color: #9ca3af;"><?= htmlspecialchars($lead['company']) ?></span><br>
                        <span style="font-size: 0.85rem; color: #64748b;"><?= htmlspecialchars($lead['business']) ?></span>
                    </td>
                    <td>
                        <a href="mailto:<?= htmlspecialchars($lead['email']) ?>" style="color: #60a5fa; text-decoration: none;"><?= htmlspecialchars($lead['email']) ?></a><br>
                        <span style="font-size: 0.9rem;"><?= htmlspecialchars($lead['phone']) ?></span>
                    </td>
                    <td>
                        <span class="tag"><?= htmlspecialchars($lead['needs']) ?></span><br>
                        <span style="font-size: 0.85rem;"><strong>Budget:</strong> <?= htmlspecialchars($lead['budget']) ?></span><br>
                        <span style="font-size: 0.85rem;"><strong>Timeline:</strong> <?= htmlspecialchars($lead['timeline']) ?></span>
                    </td>
                    <td class="details"><?= nl2br(htmlspecialchars($lead['details'] ?? 'No extra details provided.')) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($leads)): ?>
                <tr><td colspan="5" style="text-align: center; padding: 3rem; color: #9ca3af;">No leads received yet. The database is empty.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
