<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190707133823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE details_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, produit_id INT NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, quantite INT DEFAULT NULL, INDEX IDX_4BCD5F682EA2E54 (commande_id), INDEX IDX_4BCD5F6F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE details_commande ADD CONSTRAINT FK_4BCD5F682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE details_commande ADD CONSTRAINT FK_4BCD5F6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE avis CHANGE date date DATETIME DEFAULT NULL, CHANGE is_published is_published TINYINT(1) DEFAULT NULL, CHANGE text text LONGTEXT DEFAULT NULL, CHANGE note note INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal INT DEFAULT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL, CHANGE date_inscription date_inscription DATETIME DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE is_actived is_actived TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE statut_commande statut_commande VARCHAR(255) DEFAULT NULL, CHANGE date_commande date_commande DATETIME DEFAULT NULL, CHANGE date_livraison date_livraison DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE web_site web_site VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE units_in_stock units_in_stock INT DEFAULT NULL, CHANGE poids poids DOUBLE PRECISION DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE hauteur hauteur DOUBLE PRECISION DEFAULT NULL, CHANGE longueur longueur INT DEFAULT NULL, CHANGE largeur largeur INT DEFAULT NULL, CHANGE capacite capacite INT DEFAULT NULL, CHANGE couleur couleur VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE details_commande');
        $this->addSql('ALTER TABLE avis CHANGE date date DATETIME NOT NULL, CHANGE is_published is_published TINYINT(1) NOT NULL, CHANGE text text LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE note note INT NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal INT NOT NULL, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE pays pays VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE date_inscription date_inscription DATETIME NOT NULL, CHANGE phone phone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE is_actived is_actived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE commande CHANGE statut_commande statut_commande VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE date_commande date_commande DATETIME NOT NULL, CHANGE date_livraison date_livraison DATETIME NOT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE pays pays VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE phone phone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE web_site web_site VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE produit CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE units_in_stock units_in_stock INT NOT NULL, CHANGE poids poids DOUBLE PRECISION NOT NULL, CHANGE image image VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE hauteur hauteur DOUBLE PRECISION NOT NULL, CHANGE longueur longueur INT NOT NULL, CHANGE largeur largeur INT NOT NULL, CHANGE capacite capacite INT NOT NULL, CHANGE couleur couleur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
