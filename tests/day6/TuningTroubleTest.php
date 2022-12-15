<?php

declare(strict_types=1);

namespace Tests\day6;

use App\day6\TuningTrouble;
use PHPUnit\Framework\TestCase;

final class TuningTroubleTest extends TestCase
{
    /**
     * @dataProvider controlDataProvider
     */
    public function testItReturnsTheExpectedResultFromControlData(int $expectedPosition, string $buffer): void
    {
        $sut = new TuningTrouble();
        $this->assertSame($expectedPosition, $sut->getMarkerPosition(4, $buffer));
    }

    private static function controlDataProvider(): array
    {
        return [
            '1' => [7, 'mjqjpqmgbljsphdztnvjfqwrcgsmlb'],
            '2' => [5, 'bvwbjplbgvbhsrlpgdmjqwftvncz'],
            '3' => [6, 'nppdvjthqldpwncqszvftbrmjlhg'],
            '4' => [10, 'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg'],
            '5' => [11, 'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw'],
        ];
    }

    public function testItReturnsTheExpectedResultFromActualData(): void
    {
        $this->assertSame(1623, (new TuningTrouble())->getMarkerPosition(4, $this->actualDataProvider()));
    }

    private function actualDataProvider(): string
    {
        return 'pnnfhnhshrhmhwwmwzmznmnwmwfmfhfjfcjjtgtbggpdgdjjbjrjsjpjrrmddmgmpmddrhddnfnfzfpfvpfpprhhlffmtffqhhdtdcdsswsdwswmmfvvpdprrnnhhhtffnfbbznbznnvdnnbffjrfrbfrbrgbrrntnggrqqwtqwwgjgsswgwqwtwwsvwvbwvwrwlrlppzfzwfzzpmzzhqqzqlzlglzzmrmwrmwwvmwvvnppjfjttlffhjjjsccbggnffqgfgjjnccmdmzmllvnlnznttlvlttvnvgnvvqvmvqqzrqqcgglzzwtztwwmjmzjjnddsffqrqlrrvsvdvldvvlgvlvccdzczcqcpphggtnthhhtbhtttcjtjcjgcjcbbrhbbfrffgjgdgzddcttczzsccbpcpddcpcggmjgjddtcccthccfrccmdmhmddnwddfldffntnptnpttcptcptpfphhmfmwfwmmlblgbgvbvlltqltldttfcfcclgcllmplmlbbjnjzjnzzttnvvgddshddsqddggsqgqddsggdhghjgjhhgchhdmdjmjddgdhghrrphrrpnnqhhjwwqrrcmmslmmszzpgzpzzrmzmznzllnjnnlnbbdvdsdffbpffcmmnznqqcbbzvvjnjvvwqwgqqpnnzwnzwnzwwwlpwpzzfqzfqqwnqnbnfnqnbqqbggqnqdndrrzzlffbbgqgfgrfrqqsddnqnqjjgssqwqwcqcpcrrqppwpjjfnfpffhphwwmcwwznwznnplptlplnlsnlsldslslsffwtwftwtbtdbbjsjcczwwfllwtlwtlwlvwlwrwppsggvcvrrqcrqqvmqvmmbrrsbsfspspjpnnmpmqmcczgzffqmfmtmpppwzppzrpzrzsrrpqrpqpmpvmpvpttbqtqmtmjttqdqgggcppclcjcpcsppctpplpdpcppcmmdzmzddvhvhnhrrldllcwwbnwnssshlhrhthggtmggbjbjwwbvbttjllvrrfggngvngnmmvzzrrmddmcddztztctfccqpcpcqqvqppqcqdcdhhvhssgfgzgwwzmmnssvwwbqbhbnhnphpqqjcqcddfwfttqjtqtlttglljgjbgjgnnsqqvrvffqvqfqbffljjpffssqdsqstqqqldqqmhmsmsqqwtqwqdqgdgjjfbjffgbbrhhqghgppqgpgmpmmfzfhhfrhffgmfggpzgpzzhtzhhlbhhqbbzvvnvqnntptmmbhbdhdwwmjjcnnmsscqcbbtjtvjvwjvvmsmjmtmpmgghttcztzggpddbfbfgbbdsdrsrrqfqjjqfjjhzhtzzmdzzcgzgdzzmvmmfmjmgjmggmppbdppmzpppvfppzhhfsfwfhhpjpmmrjjpssdccjpjpwjppvdpphcpcjcfjfwjfwfjwfjjqcqcwqqqsmmmbbgdgwwpcwwdfdlflrltlgtthfhfjhhlthtddlgdggsjsrrdpdcppgttphpgpwppmpzmmrjmmvjvgvgfglfgllbqlqhllszzlwwhzzdfdcdtctptwtztfzzmjzjtjtrjrcrnrjjmwmnnbddgvgtgsstjsszmpqdmzgqflrbrspjmtzjcrmlzltmhgblghnwqvwwqwzbpnfrpdpblpjgshfccfbjfsnwvvhnjftsdnsgtzzjtzpmtfdvzrhtqpblhwgmqtgpbfvbdmsnrrrvvbstpsznvbbwgjfqjrhdvwvgptpglpfddhddmtglmjlpwlvfpbtbmgbplbzrlpdlvqzcwhbscpszgfstjpfdvfpmljlngrbgrdnnblzqrfpzsdvblpwbtnhdjclldvwvbwcwzfzbdspgwpfqjfbdbrqcshtlvcrdstnzggbwqnzbrfzbpnrtmvpbvdhcvdsdshgtvhfgdzljflppqbwclnvbhbczvrscjhlbgbfvwdjhnjsgmvwhpfgwbbmnndpnglfrmtfdzvqgfjdqfhgrhvpbqndmqnqccgwswwdsqjnbjtjbjdbqgjnmfbdvlnfwbnrdqgvgzzhmmbbdzfdvvpwhpbwbnzdcdpchrwlhfsjnhhjggvplmqggwjdsvjtpnpnqgldjjdcscrdltssjdrpcrfbgbcjfplhzgwbprfcslhpcngtszrghmwhzdqscbfrhzdwcffzvmjrmcjcstfvhplvrsglgsjnjtrpddsdfqjsndjnfmvdhfgdbzzflqhsrrwmrnlpqzmcddqbqvvzgtlztpgjnddtcnbmqsjlhmcszrmcjvwzpptlfqsmpvgnzvrjdwzpdwqgbmdgdtvjlmfczthjbcgfhbqpnmlbmrwwhfptzlbmfdhssznjcvjbmnjtnvzjhzczlrrdnttmmcbnzhqpplzqwgttwrnwfvmnptgqlfrnzvqpjfgrzwmlcwvtptvcvrlsrdwdgqfvffspmdbnnrqjttpqvhvdpbcrvzptwnhhfsqzchmncvttcdgdnlppcfzpmjpvbvqhlvplwvrmmbbggbwttwmvsqjlllsftprsmtmnzjcqfzblrllzgshfljchrjwjlpvhpbrtrsschzltrblgjnbgdnmwdggjhqggntblnhsvfgsbcblhmctbqzqwmhqnjhpzjfqpjdgwpzhczcftfcpdhvzhzccmwmrfrbqshzmtpqgpbbvfqqbjbmvnlnlwjtzrpmhdlffccrqcfgsjfszbrzrfztntchtmgmbhjgmlsqzcbtqqjzzlghtzzqmlnnvsgsvbbjfgqsqbqmqrdzwpwdgbggpdvhvnlzshhntprjdwhnwfvdjzpqgflwrvwgtmfdmfdztcbtfnjdrvgdwwczdgphnvdgrbdchprqldfjrvcsflcmlcmzqvqgsgnzcgmrhccgcmptcdzhbcdgdtppwztfstzqqzqrdzlnzthggjmpcflmbcmdrrjnnpbpqfmjbzqbtsjjgdlmgncbmgspqqvbrvzrdjscpzjsdtcdvsdwqlmwrngttswnrsbqctvhgfnnwblpcqzdmzpfchplslspmghvgcqntmlrfhgpcbpspvfhnvqvglsqzsnsdzddqpbsjhlclslngbwvvgjhwfcncqsmqwbptzvpzlzslsjjjldjpwpfrdlfbjphqcjtsgqdsdfdjhqgdhcppndwmhmmldvvmblcqcqfqhltbcbvrnghjfmtgqwtwljtczvqlnmgscjhqdhnzwhzvzzqnlsrhqvljqpgpwghfqlhjjrrhvnmnnrbnlhdcjctwtlhmhhmhjvcgzdrzmdjrvqzgnsttjdwglgwlcmbcdnjprgfsbbdzzngbqdrvwwwhbtlnnmzqdjttsrrpvlfdqnfhhtdtvmpcjgdwtbnqmwmtszdqfmbhjsjpqqddzfggwjhbtlnqfgcwbjzdtcpcpzgnrmnvwlpgmwfjlpgppdfrfvvjwsfcdqdnpcpjbqsvhttssgptqjghctrbgntlfjzdrfjccsprsjlrrwrzsmnjsqslmpdtrvhlqbnmgpjthpqdqmnvrtzlhhzzfzbrcclpmpcszhbttgrtcpgcpjwpdbfpfvgspsgtvglwthqcmcvmrfmclwlvjlsptfgmtlrnsvjrnfwzhdcsmgztpzfcvzwdztpppvqpvqfpdrsfnlhrbqwrsqjtwjmhnpwmqmpdgdhbtbpfwnmswffdqffdggrdrpmngvpzplmmwlddnhcvjjzqqfsbbtfmzdwnpvbjrshmllczhgvwwcbcbtfrfnplqjwmjlvpwwgfrtffwddwppsgtnlmpvfnhfzcsgjbqbjmbvpnqppsrvwnlzvcmjqgtbzrdsnrgwbfmrvnflgccrssfvcwgllqqbbcthzmbtnsmbzbcczhtzcvmthttpltrtdmgspctvtpvqbhmnnpnjwmhpqclmjsdrbjwvjbtzcjlqbjsvbgdwqzflnwzcfjwtrhjgfshfmwbjfwpnhjsmtpgbpwlfjjnmdlrhchmnfmgmgcrftmwbzshdwbhndgwtjbrrvbwprqppfmgfmfllpcjgrwdmtzddthsjlgjljv';
    }

    /**
     * @dataProvider controlDataProviderPt2
     */
    public function testItReturnsTheExpectedResultFromControlDataPart2(int $expectedPosition, string $buffer): void
    {
        $this->assertSame($expectedPosition, (new TuningTrouble())->getMarkerPosition(14, $buffer));
    }

    private static function controlDataProviderPt2(): array
    {
        return [
            '1' => [19, 'mjqjpqmgbljsphdztnvjfqwrcgsmlb'],
            '2' => [23, 'bvwbjplbgvbhsrlpgdmjqwftvncz'],
            '3' => [23, 'nppdvjthqldpwncqszvftbrmjlhg'],
            '4' => [29, 'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg'],
            '5' => [26, 'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw'],
        ];
    }

    public function testItReturnsTheExpectedResultFromActualDataPart2(): void
    {
         $this->assertSame(3774, (new TuningTrouble())->getMarkerPosition(14, $this->actualDataProvider()));
    }
}
