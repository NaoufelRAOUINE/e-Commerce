<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190623134555 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fournisseur ADD codepostal VARCHAR(255) NOT NULL, ADD website VARCHAR(255) NOT NULL, DROP code_postal, DROP web_site, CHANGE is_actived isactived TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fournisseur ADD code_postal VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD web_site VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP codepostal, DROP website, CHANGE isactived is_actived TINYINT(1) DEFAULT NULL');
    }
}
