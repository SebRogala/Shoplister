<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220816183747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop ALTER default_section_order TYPE TEXT');
        $this->addSql('ALTER TABLE shop ALTER default_section_order DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN shop.default_section_order IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "shop" ALTER default_section_order TYPE TEXT');
        $this->addSql('ALTER TABLE "shop" ALTER default_section_order DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN "shop".default_section_order IS \'(DC2Type:array)\'');
    }
}
