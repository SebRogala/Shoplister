<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220807085533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "shopping_list_item" (id UUID NOT NULL, list_id UUID NOT NULL, name VARCHAR(255) NOT NULL, quantity DOUBLE PRECISION NOT NULL, unit VARCHAR(50) NOT NULL, is_done BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4FB1C2243DAE168B ON "shopping_list_item" (list_id)');
        $this->addSql('COMMENT ON COLUMN "shopping_list_item".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "shopping_list_item".list_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "shopping_list_item".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "shopping_list_item".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE "shopping_list_item" ADD CONSTRAINT FK_4FB1C2243DAE168B FOREIGN KEY (list_id) REFERENCES "shopping_list" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE "shopping_list_item"');
    }
}
