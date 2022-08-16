<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220816141725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('DELETE FROM "shopping_list_item"');
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop ADD default_section_order TEXT DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN shop.default_section_order IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE shopping_list_item ADD section_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE shopping_list_item DROP section');
        $this->addSql('COMMENT ON COLUMN shopping_list_item.section_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE shopping_list_item ADD CONSTRAINT FK_4FB1C224D823E37A FOREIGN KEY (section_id) REFERENCES "shop_section" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4FB1C224D823E37A ON shopping_list_item (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "shopping_list_item" DROP CONSTRAINT FK_4FB1C224D823E37A');
        $this->addSql('DROP INDEX IDX_4FB1C224D823E37A');
        $this->addSql('ALTER TABLE "shopping_list_item" ADD section VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE "shopping_list_item" DROP section_id');
        $this->addSql('ALTER TABLE "shop" DROP default_section_order');
    }
}
