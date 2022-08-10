<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220810142629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shopping_list ADD shop_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN shopping_list.shop_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE shopping_list ADD CONSTRAINT FK_3DC1A4594D16C4DD FOREIGN KEY (shop_id) REFERENCES "shop" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_3DC1A4594D16C4DD ON shopping_list (shop_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "shopping_list" DROP CONSTRAINT FK_3DC1A4594D16C4DD');
        $this->addSql('DROP INDEX IDX_3DC1A4594D16C4DD');
        $this->addSql('ALTER TABLE "shopping_list" DROP shop_id');
    }
}
