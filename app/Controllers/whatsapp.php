<?php namespace App\Controllers;


use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;

class whatsapp extends BaseController
{
    public function send($nowa, $pesan)
    {
        // Load the cURL library
        $curl = \Config\Services::curlrequest();

        // Set the request parameters
        $url = 'https://api.fonnte.com/send';
        $headers = [
            'Authorization' => 'RBGaVwh@!GV00oWE1H@d'
        ];
        $data = [
            'target' => $nowa,
            'message' => $pesan
        ];

        // Send the POST request using cURL
        $response = $curl->request('post', $url, [
            'headers' => $headers,
            'form_params' => $data
        ]);

    }
    
    public function kirim($nowa, $pesan) {
        $reqParams = [
            'token' => '_Y59h}s~2/nWyw8Eah{6JUC^301I7IcppZj|ojcBhUUseyIC-bisri',
            'url' => 'https://api.kirimwa.id/v1/messages',
            'method' => 'POST',
            'payload' => json_encode([
                'message' => $pesan,
                'phone_number' => $nowa,
                'message_type' => 'text',
                'device_id' => 'bisbiss'
            ])
        ];
    
        try {
            $response = $this->sendRequest($reqParams);
            //   echo $response['body'];
        } catch (Exception $e) {
            print_r($e);
        }
    }
    
    private function sendRequest(array $params) {
        $httpStreamOptions = [
            'method' => $params['method'] ?? 'GET',
            'header' => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . ($params['token'] ?? '')
            ],
            'timeout' => 15,
            'ignore_errors' => true
        ];
    
        if ($httpStreamOptions['method'] === 'POST') {
            $httpStreamOptions['header'][] = sprintf('Content-Length: %d', strlen($params['payload'] ?? ''));
            $httpStreamOptions['content'] = $params['payload'];
        }
    
        // Join the headers using CRLF
        $httpStreamOptions['header'] = implode("\r\n", $httpStreamOptions['header']) . "\r\n";
    
        $stream = stream_context_create(['http' => $httpStreamOptions]);
        $response = file_get_contents($params['url'], false, $stream);
    
        $httpStatus = $http_response_header[0];
        preg_match('#HTTP/[\d\.]+\s(\d{3})#i', $httpStatus, $matches);
    
        if (! isset($matches[1])) {
            throw new Exception('Can not fetch HTTP response header.');
        }
    
        $statusCode = (int) $matches[1];
        if ($statusCode >= 200 && $statusCode < 300) {
            return ['body' => $response, 'statusCode' => $statusCode, 'headers' => $http_response_header];
        }
    
        throw new Exception($response, $statusCode);
    }

            
}

?>

