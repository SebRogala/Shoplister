<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110181021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add ProductTemplate and Recipe tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `product_template` (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', section_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, searchable VARCHAR(255) NOT NULL, unit VARCHAR(50) NOT NULL, quantity DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5CD07514D823E37A (section_id), FULLTEXT INDEX IDX_5CD0751494CD8C0D (searchable), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `recipe` (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', creator_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, portions SMALLINT NOT NULL, calories SMALLINT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DA88B13761220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `product_template` ADD CONSTRAINT FK_5CD07514D823E37A FOREIGN KEY (section_id) REFERENCES `shop_section` (id)');
        $this->addSql('ALTER TABLE `recipe` ADD CONSTRAINT FK_DA88B13761220EA6 FOREIGN KEY (creator_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `product_template`');
        $this->addSql('DROP TABLE `recipe`');
    }
}
