<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_text = $_POST['user_text'];

    // 简单的防范措施，防止XSS攻击
    $user_text = htmlspecialchars($user_text, ENT_QUOTES, 'UTF-8');

    // 将提交的文本存储在一个文件中
    $file = 'submissions.txt';
    file_put_contents($file, $user_text . PHP_EOL, FILE_APPEND | LOCK_EX);

    echo "提交成功！";
} else {
    echo "无效的请求方式。";
}
?>
