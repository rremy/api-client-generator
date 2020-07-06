<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientGenerator\Test\Functional\Input;

use DoclerLabs\ApiClientGenerator\Input\InvalidSpecificationException;
use DoclerLabs\ApiClientGenerator\Input\FileReader;
use DoclerLabs\ApiClientGenerator\ServiceProvider;
use PHPUnit\Framework\TestCase;
use Pimple\Container;

/**
 * @coversDefaultClass FileReader
 */
class FileReaderTest extends TestCase
{
    protected FileReader  $sut;

    public function setUp(): void
    {
        $container = new Container();
        $container->register(new ServiceProvider());

        set_error_handler(
            static function (int $code, string $message) {
            },
            E_USER_WARNING
        );

        $this->sut = $container[FileReader::class];
    }

    /**
     * @dataProvider validFileProvider
     */
    public function testParseValidFile(string $filePath): void
    {
        $this->assertNotNull($this->sut->read($filePath));
    }

    /**
     * @dataProvider invalidFileProvider
     */
    public function testParseInvalidFile(string $filePath): void
    {
        $this->expectException(InvalidSpecificationException::class);
        $this->sut->read($filePath);
    }

    public function validFileProvider()
    {
        return [
            [__DIR__ . '/FileReader/openapi.yaml'],
            [__DIR__ . '/FileReader/openapi.yml'],
            [__DIR__ . '/FileReader/openapi.json'],
        ];
    }

    public function invalidFileProvider()
    {
        return [
            [__DIR__ . '/FileReader/non_existing'],
            [__DIR__ . '/FileReader/openapi.invalid'],
        ];
    }
}