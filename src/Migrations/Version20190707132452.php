<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190707132452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE units_in_stock units_in_stock INT DEFAULT NULL, CHANGE poids poids DOUBLE PRECISION DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE hauteur hauteur DOUBLE PRECISION DEFAULT NULL, CHANGE longueur longueur INT DEFAULT NULL, CHANGE largeur largeur INT DEFAULT NULL, CHANGE capacite capacite INT DEFAULT NULL, CHANGE couleur couleur VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE units_in_stock units_in_stock INT NOT NULL, CHANGE poids poids DOUBLE PRECISION NOT NULL, CHANGE image image VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE hauteur hauteur DOUBLE PRECISION NOT NULL, CHANGE longueur longueur INT NOT NULL, CHANGE largeur largeur INT NOT NULL, CHANGE capacite capacite INT NOT NULL, CHANGE couleur couleur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
