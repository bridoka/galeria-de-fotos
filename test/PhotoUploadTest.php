<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 24/03/2018
 * Time: 20:53
 */
namespace phpUnitTutorial\Test;

use App\Service\PhotoUpload;

require_once 'vendor/autoload.php';

class PhotoUploadTest extends \PHPUnit\Framework\TestCase
{
    private $invalidFile = __DIR__ . '/resource/Invalid.exe';
    private $validFile = __DIR__ . '/resource/Valid.jpg';
    private $service;
    
    /**
     * setUp
     *
     * Prepara os recursos necessarios a todos testes.
     */
    protected function setUp()
    {
        $this->service = new PhotoUpload();
    }

    /**
     * tearDown
     *
     * Remove recursos alocados apos cada teste.
     */
    protected function tearDown()
    {
        unset($_FILES);
    }

    /**
     * testWithInvalidExtensionUploadShouldFail
     *
     * Valida que o upload extensao invalida e tratado e impedido.
     */
    public function testWithInvalidExtensionUploadShouldFail()
    {
        $this->setupUploadResource($this->invalidFile);
        $result = $this->service->execute();
        $this->assertFalse($result);
    }

    /**
     * testWithInvalidUploadFileShouldFail
     *
     * Valida que o upload com o objeto $_POST inválido (criado programaticamente) 
     * nao e validado pela is_uploaded_file
     */
    public function testWithInvalidUploadFileShouldFail()
    {
        $this->setupUploadResource($this->validFile);
        $result = $this->service->execute();
        $this->assertFalse($result);
    }

    /**
     * setupUploadResource
     *
     * Cria um objeto que simula a realizacao de um upload
     * @param string $path
     * @return array $_FILES
     */
    private function setupUploadResource($path)
    {
        $_FILES = array(
            'image' => array(
                'name' => $path,
                'size' => 999,
                'tmp_name' => $path,
                'image' => $path,
                'error' => 0
            )
        );
    }
}