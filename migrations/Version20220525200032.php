<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220525200032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capture (id INT AUTO_INCREMENT NOT NULL, id_type_id INT NOT NULL, id_region_id INT NOT NULL, INDEX IDX_8BFEA6E51BD125E3 (id_type_id), INDEX IDX_8BFEA6E51813BD72 (id_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dresseur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, starter_taken TINYINT(1) NOT NULL, argent INT NOT NULL, UNIQUE INDEX UNIQ_77EA2FC6E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, id_type_1_id INT NOT NULL, id_type_2_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, is_evolution TINYINT(1) NOT NULL, is_starter TINYINT(1) NOT NULL, type_courbe_niveau VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, can_evolve TINYINT(1) NOT NULL, INDEX IDX_62DC90F3A7E925D5 (id_type_1_id), INDEX IDX_62DC90F3B55C8A3B (id_type_2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_dresseur (id INT AUTO_INCREMENT NOT NULL, id_dresseur_id INT NOT NULL, id_pokemon_id INT NOT NULL, surnom VARCHAR(255) DEFAULT NULL, genre VARCHAR(255) NOT NULL, exp INT NOT NULL, date_time_derniere_activite DATETIME DEFAULT NULL, INDEX IDX_F08EE668B9B2D149 (id_dresseur_id), INDEX IDX_F08EE6688A6D9CE9 (id_pokemon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, id_pokemon_dresseur_id INT NOT NULL, prix INT NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_888A2A4C644B39DE (id_pokemon_dresseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE capture ADD CONSTRAINT FK_8BFEA6E51BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE capture ADD CONSTRAINT FK_8BFEA6E51813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3A7E925D5 FOREIGN KEY (id_type_1_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3B55C8A3B FOREIGN KEY (id_type_2_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pokemon_dresseur ADD CONSTRAINT FK_F08EE668B9B2D149 FOREIGN KEY (id_dresseur_id) REFERENCES dresseur (id)');
        $this->addSql('ALTER TABLE pokemon_dresseur ADD CONSTRAINT FK_F08EE6688A6D9CE9 FOREIGN KEY (id_pokemon_id) REFERENCES pokemon (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C644B39DE FOREIGN KEY (id_pokemon_dresseur_id) REFERENCES pokemon_dresseur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon_dresseur DROP FOREIGN KEY FK_F08EE668B9B2D149');
        $this->addSql('ALTER TABLE pokemon_dresseur DROP FOREIGN KEY FK_F08EE6688A6D9CE9');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C644B39DE');
        $this->addSql('ALTER TABLE capture DROP FOREIGN KEY FK_8BFEA6E51813BD72');
        $this->addSql('ALTER TABLE capture DROP FOREIGN KEY FK_8BFEA6E51BD125E3');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3A7E925D5');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3B55C8A3B');
        $this->addSql('DROP TABLE capture');
        $this->addSql('DROP TABLE dresseur');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE pokemon_dresseur');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE vente');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
