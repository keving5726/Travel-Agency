<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190905053737 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE boleto (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, codigo_id INT NOT NULL, INDEX IDX_462E6E25DB38439E (usuario_id), INDEX IDX_462E6E25B797D96 (codigo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, cedula VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(180) NOT NULL, apellido VARCHAR(180) NOT NULL, direccion VARCHAR(180) NOT NULL, telefono VARCHAR(180) NOT NULL, UNIQUE INDEX UNIQ_2265B05D7BF39BE0 (cedula), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE viaje (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(180) NOT NULL, plazas INT NOT NULL, origen VARCHAR(180) NOT NULL, destino VARCHAR(180) NOT NULL, precio DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_1D41ED1620332D99 (codigo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boleto ADD CONSTRAINT FK_462E6E25DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE boleto ADD CONSTRAINT FK_462E6E25B797D96 FOREIGN KEY (codigo_id) REFERENCES viaje (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boleto DROP FOREIGN KEY FK_462E6E25DB38439E');
        $this->addSql('ALTER TABLE boleto DROP FOREIGN KEY FK_462E6E25B797D96');
        $this->addSql('DROP TABLE boleto');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE viaje');
    }
}
