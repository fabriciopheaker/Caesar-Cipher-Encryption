<?php


function encript($texto)
{
  $resultado = '';
  $deslocamento = 5 % 26; // Garante que o deslocamento está dentro do range do alfabeto
  $texto = mb_strtolower($texto, 'UTF-8');
  for ($i = 0; $i < strlen($texto); $i++) {
    $char = $texto[$i];
    // Verifica se o caractere é uma letra
    if (ctype_alpha($char)) {
      //valor ASCII do caractere minusculo (97 A 122).
      $ascii = ord($char);
      $resultado .= chr((($ascii - 97 + $deslocamento) % 26) + 97);
    } else {
      // Mantém caracteres que não são letras inalterados
      $resultado .= $char;
    }
  }
  return $resultado;
}


function decript($texto)
{
  $resultado = '';
  $deslocamento = 5 % 26; // Garante que o deslocamento está dentro do range do alfabeto
  for ($i = 0; $i < strlen($texto); $i++) {
    $char = $texto[$i];
    // Verifica se o caractere é uma letra
    if (ctype_alpha($char)) {
      //valor ASCII do caractere minusculo (97 A 122).
      $ascii = ord($char);
      $resultado .= chr((($ascii - 97 - $deslocamento + 26) % 26) + 97);
    } else {
      // Mantém caracteres que não são letras inalterados
      $resultado .= $char;
    }
  }

  return $resultado;
}



// Exemplo de uso
$texto = "A Meta, dona do Instagram, do Facebook e do WhatsApp, afirmou nesta quinta-feira (18) que vai adiar o lançamento de seu novo modelo de inteligência artificial (IA) na União Europeia por conta do que chamou de ambiente regulatório imprevisível, segundo a imprensa internacional.
A declaração foi veiculada um dia depois de a Meta dizer que suspendeu recursos de IA generativa no Brasil. A decisão no mercado brasileiro veio após a ordem da Autoridade Nacional de Proteção de Dados (ANPD) para a empresa interromper a coleta de dados de usuários para treinar sua IA.";

$cifrado = encript($texto);

echo $cifrado . PHP_EOL;


$decifrado = decript($cifrado);

echo  PHP_EOL . $decifrado;
