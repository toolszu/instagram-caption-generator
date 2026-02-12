<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allow CORS for testing

require_once '../config.php';

// 1. Receive JSON Input
$input = json_decode(file_get_contents('php://input'), true);

// 2. Simple Validation
if (!isset($input['topic']) || empty($input['topic'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Topic is required']);
    exit;
}

$topic = htmlspecialchars($input['topic']);
$tone = isset($input['tone']) ? htmlspecialchars($input['tone']) : 'Professional';

// 3. Construct the Prompt
$prompt = "Write 3 Instagram captions about '$topic'. Tone: $tone. Include emojis.";

// ============================================================
// INTEGRATE YOUR AI SERVICE HERE
// ============================================================

$mockResponse = [
    "captions" => [
        "1. " . $topic . " vibes only! ✨ Let me know what you think below 👇 #vibes",
        "2. Just another day enjoying " . $topic . ". Who else loves this? 🔥 #" . str_replace(' ', '', $topic),
        "3. Pov: You just discovered " . $topic . " and life is good. 🚀 #trending"
    ]
];

// Return JSON
echo json_encode($mockResponse);

/* // EXAMPLE IMPLEMENTATION HINT:
   $ch = curl_init('https://openrouter.ai/api/v1/chat/completions');
   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
       "model" => PRIMARY_MODEL,
       "messages" => [["role" => "user", "content" => $prompt]]
   ]));
   // ... execute and parse result
*/
?>
