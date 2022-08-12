<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220811164014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO shop_section (id, name) VALUES
                                        ('ba72030e-0cf2-42c4-a88f-b20340c93960', '-Brak-'),
                                        ('8760939b-b896-490e-973d-c2211a7b35c8', 'Pieczywo'),
                                        ('56fbfea0-43c0-4505-a8ba-71bafe61a1ce', 'Przekąski słodkie'),
                                        ('ff280912-530d-41e1-969b-4e4170002e4e', 'Przekąski słone'),
                                        ('9d69e3ab-861f-4b5d-976c-0526540e32bd', 'Kawy'),
                                        ('9b79d435-5d83-4b00-bcf8-837b14e6ad6c', 'Bakalie'),
                                        ('af832f47-0655-4cdd-80f6-a75f2d93e225', 'Owoce'),
                                        ('4e9ee3de-04c8-4e59-942d-34cc9e5048f2', 'Warzywa'),
                                        ('7d558067-3341-4d0d-8f53-25cc0e5ad37f', 'Zioła świeże'),
                                        ('30f22f34-519d-485b-beb0-ba38757597bd', 'Napoje'),
                                        ('4a052ab8-7357-4dcd-98c9-fe1ce5b2c0de', 'Ryby surowe'),
                                        ('68a4ca5e-1c9f-4285-bed3-5a49cf01b891', 'Mięso'),
                                        ('6655fa12-c28f-4854-8495-87c967bf6984', 'Wędliny'),
                                        ('508fefd4-1a15-4b20-89b1-03724c0a3987', 'Sery zółte'),
                                        ('bab65cf9-1876-42b3-b9ab-fcbacce24ecc', 'Sery pleśniowe'),
                                        ('35490ab0-d108-4130-9337-b56efa56249f', 'Nabiał'),
                                        ('5aca9685-416f-4298-a934-a7880b0280e4', 'Mrożonki'),
                                        ('0d187b84-27fe-4246-85e5-ebf554239522', 'Lody'),
                                        ('324a8119-b792-42a3-a7c2-b864db9dd621', 'Makarony, kasze, ryż'),
                                        ('f538b73e-9e20-46b2-976b-844d9b7461c9', 'Konserwy'),
                                        ('12f52e24-c627-47d3-97d5-45d92687835d', 'Oleje'),
                                        ('a63a3bce-03cb-4d6b-8c33-f5dc8dec297c', 'Mąki'),
                                        ('1e535175-1275-4703-9b29-23271d7384d8', 'Produkty suche i długoterminowe'),
                                        ('ea674a5a-fcc9-4686-9db3-243e9b806e84', 'Chemia gospodarcza'),
                                        ('d86eb2e7-5706-4b96-b380-668eec61ec86', 'Artykuły gospodarcze'),
                                        ('2bda8485-3959-44b9-b166-cc9e5bd6765b', 'Artykuły dziecięce'),
                                        ('44c94431-9bf7-4a8b-acda-5751717c0b59', 'Chipsy'),
                                        ('42e203e9-e5da-4976-b0cd-9e26637af2d9', 'Przyprawy'),
                                        ('545eb8b2-55ae-4884-98e6-15fa5ffad533', 'Alkohol')
                                        ");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
