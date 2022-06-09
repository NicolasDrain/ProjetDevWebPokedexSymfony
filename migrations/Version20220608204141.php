<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608204141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente ADD id_dresseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CB9B2D149 FOREIGN KEY (id_dresseur_id) REFERENCES dresseur (id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CB9B2D149 ON vente (id_dresseur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CB9B2D149');
        $this->addSql('DROP INDEX IDX_888A2A4CB9B2D149 ON vente');
        $this->addSql('ALTER TABLE vente DROP id_dresseur_id');
    }
}
