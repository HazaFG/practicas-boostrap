<?php
class ProductController
{
  function getAllProducts()
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token'],
        'Cookie: XSRF-TOKEN=eyJpdiI6Ilp6a0d6MDVLb3E4Z2VhdFByelB5a3c9PSIsInZhbHVlIjoiQWF6N2Zyb29vbVdZczJwc1JoVTVMeXAyZ1VLOTFHM1h6TFJmVW1udTZSMFRoRVV0a0lwaDRpZm1iVWl1QXpOd1haM0RNaDVUZUJjc2szTWdka1diZWtCVHBCb2J0WVBKL0tLS1k1cy8vRlZCeW9ldEJmOStWbnhIdFhMbHFCT2EiLCJtYWMiOiI0NGEzOTFkNDAyYjdkNDBhNDBiMzVjMzMyNDkzM2NkMTIxZWNhYjEwY2U1ODkwODA5YTYzNjAzNTJhZDMxMmJlIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IndDNnZxNE9hNkJKM2hpcXFnSTJrNUE9PSIsInZhbHVlIjoiRXlvc1gwYUhaWWJjN1pNM2RrdWVtVEtrUU9jOGtsVjYwQ0l6cVdZQVZZRklYcURpdy9ha3g1UUNnU3lFQXNnNHdmZzQzNnZwU1M1TDZOalgxcTMrZkRVQlFvMzdUZm5OUVdPLzgzUk51bGxnaGFBU0Z2SnF5UEJNR2o0TVFtS3IiLCJtYWMiOiJkNTBjZDNlZDJkNDYzNTkzMDQ3MzUyY2EwZmZiODRjNjk3YjdmZjI1ZjkxMzVjZjQwNzBiNmZlNzVlZTQwMDhlIiwidGFnIjoiIn0%3D'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function getProductById($id, $token)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Cookie: XSRF-TOKEN=eyJpdiI6Ilp6a0d6MDVLb3E4Z2VhdFByelB5a3c9PSIsInZhbHVlIjoiQWF6N2Zyb29vbVdZczJwc1JoVTVMeXAyZ1VLOTFHM1h6TFJmVW1udTZSMFRoRVV0a0lwaDRpZm1iVWl1QXpOd1haM0RNaDVUZUJjc2szTWdka1diZWtCVHBCb2J0WVBKL0tLS1k1cy8vRlZCeW9ldEJmOStWbnhIdFhMbHFCT2EiLCJtYWMiOiI0NGEzOTFkNDAyYjdkNDBhNDBiMzVjMzMyNDkzM2NkMTIxZWNhYjEwY2U1ODkwODA5YTYzNjAzNTJhZDMxMmJlIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IndDNnZxNE9hNkJKM2hpcXFnSTJrNUE9PSIsInZhbHVlIjoiRXlvc1gwYUhaWWJjN1pNM2RrdWVtVEtrUU9jOGtsVjYwQ0l6cVdZQVZZRklYcURpdy9ha3g1UUNnU3lFQXNnNHdmZzQzNnZwU1M1TDZOalgxcTMrZkRVQlFvMzdUZm5OUVdPLzgzUk51bGxnaGFBU0Z2SnF5UEJNR2o0TVFtS3IiLCJtYWMiOiJkNTBjZDNlZDJkNDYzNTkzMDQ3MzUyY2EwZmZiODRjNjk3YjdmZjI1ZjkxMzVjZjQwNzBiNmZlNzVlZTQwMDhlIiwidGFnIjoiIn0%3D'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  // Obtener por slug
  function getProductBySlug($slug, $token)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Cookie: XSRF-TOKEN=eyJpdiI6Ilp6a0d6MDVLb3E4Z2VhdFByelB5a3c9PSIsInZhbHVlIjoiQWF6N2Zyb29vbVdZczJwc1JoVTVMeXAyZ1VLOTFHM1h6TFJmVW1udTZSMFRoRVV0a0lwaDRpZm1iVWl1QXpOd1haM0RNaDVUZUJjc2szTWdka1diZWtCVHBCb2J0WVBKL0tLS1k1cy8vRlZCeW9ldEJmOStWbnhIdFhMbHFCT2EiLCJtYWMiOiI0NGEzOTFkNDAyYjdkNDBhNDBiMzVjMzMyNDkzM2NkMTIxZWNhYjEwY2U1ODkwODA5YTYzNjAzNTJhZDMxMmJlIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IndDNnZxNE9hNkJKM2hpcXFnSTJrNUE9PSIsInZhbHVlIjoiRXlvc1gwYUhaWWJjN1pNM2RrdWVtVEtrUU9jOGtsVjYwQ0l6cVdZQVZZRklYcURpdy9ha3g1UUNnU3lFQXNnNHdmZzQzNnZwU1M1TDZOalgxcTMrZkRVQlFvMzdUZm5OUVdPLzgzUk51bGxnaGFBU0Z2SnF5UEJNR2o0TVFtS3IiLCJtYWMiOiJkNTBjZDNlZDJkNDYzNTkzMDQ3MzUyY2EwZmZiODRjNjk3YjdmZjI1ZjkxMzVjZjQwNzBiNmZlNzVlZTQwMDhlIiwidGFnIjoiIn0%3D'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->data;
  }

  function createProduct($data, $token)
  {
      $curl = curl_init();
      if (isset($data['cover']) && file_exists($data['cover']['tmp_name'])) {
          $data['cover'] = new CURLFile($data['cover']['tmp_name'], $data['cover']['type'], $data['cover']['name']);
      }
  
      curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $data, // Enviar el array directamente
          CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer ' . $token,
          ),
      ));
  
      $response = curl_exec($curl);
  
      if ($response === false) {
          echo 'Error en la solicitud: ' . curl_error($curl);
      }
  
      curl_close($curl);
  
      return json_decode($response);
  }  

  function updateProduct($id, $data, $token)
  {
      $curl = curl_init();
  
      // Construye los datos que enviarás en la solicitud
      $postFields = http_build_query(array_merge($data, ['id' => $id]));
  
      curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $postFields,
          CURLOPT_HTTPHEADER => array(
              'Content-Type: application/x-www-form-urlencoded',
              'Authorization: Bearer ' . $token,
          ),
      ));
  
      $response = curl_exec($curl);
      $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  
      curl_close($curl);
  
      if ($http_status != 200) {
          echo "Error: HTTP Status Code: $http_status\n";
      } else {
          echo "Success: $response\n";
      }
  }



  function deleteProduct($productId) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $productId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['api_token'],
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $decodedResponse = json_decode($response);

    if ($decodedResponse && isset($decodedResponse->code) && $decodedResponse->code == 4) {
        header("Location: ../home.php?status=deleted");
    } else {
        header("Location: ../home.php?status=error");
    }
}

  
}
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $productController = new ProductController();
    $token = $_SESSION['api_token']; 

      if (isset($_POST['productId'])) {
          $productId = $_POST['productId'];
          $data = [
              'name' => $_POST['name'],
              'slug' => $_POST['slug'],
              'description' => $_POST['description'],
              'features' => $_POST['features'],
          ];
  
          $productController->updateProduct($productId, $data, $token);
        }
  }
  


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  $productController = new ProductController();
  $token = $_SESSION['api_token']; 

  $data = [
      'name' => $_POST['name'],
      'slug' => $_POST['slug'],
      'description' => $_POST['description'],
      'features' => $_POST['features'],
  ];

  // Manejo del archivo (cargar la imagen)
  if (isset($_FILES['cover']) && $_FILES['cover']['error'] == UPLOAD_ERR_OK) {
      $data['cover'] = $_FILES['cover'];
  }

  $result = $productController->createProduct($data, $token);

  if ($result === null) {
      echo "Error: No se recibió respuesta de la API.";
  } else if (isset($result->success) && $result->success) {
      exit;
  } else {
      if (isset($result->message) && strpos($result->message, 'creado correctamente') !== false) {
          header("Location: ../home.php");
          exit;
      } else {
          $errorMessage = isset($result->message) ? $result->message : 'Ocurrió un error desconocido.';
          echo "Error al crear el producto: " . $errorMessage;
      }
  }
}
