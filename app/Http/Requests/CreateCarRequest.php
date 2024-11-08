<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use http\Env\Request;
use Illuminate\Validation\Rule;

class CreateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'type' => ['sometimes', 'required'],
            'image' => ['nullable'],
            'license' => ['sometimes', 'required', 'unique:App\Models\Car,license'],
            'car_plate' => ['sometimes', 'required', 'unique:App\Models\Car,car_plate'],
            'seat_num' => ['required', 'numeric', 'integer', 'min:4'],
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'Type',
            'image' => 'Image',
            'license' => 'License Number',
            'car_palte' => 'Car palte',
            'seat_num' => 'Seat Number'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'unique' => ':attribute is existed',
            'required_if' => ':attribute is required when create Car',
        ];
    }
    /**
    Nằm một mình trong phòng đợi mẹ, tự dưng chưa bao giờ Hùng lại cảm thấy thèm muốn được ngủ cùng Hồng đến thế, mỗi phút qua đi, người chàng lại càng lúc càng nóng bừng bừng lên, tự dưng những hình ảnh ở quá khứ lại dồn dập kéo đến trong đầu chàng, đó là những hình ảnh về cơ thể mẹ cậu, đó là những lần cậu tắm chung với mẹ lúc nhỏ, rồi những lần cậu vô tình trông thấy Hồng thay đồ, và đang nhớ nhất vẫn là nhưng đêm cậu ngủ chung giường cùng ba mẹ, nữa đêm tỉnh dậy, những tiếng rên khe khẽ, những tiếng thở nặng nhọc làm cậu thức giấc. Trong bóng tối, tuy không biết ba mẹ mình đang làm những gì, nhưng cậu biết chắc rằng đó là việc mà mấy đứa bạn cậu gọi là “đụ nhau”…
    Càng lúc những ý nghĩ đen tối càng xâm chiếm đầu Hùng, mò tay vào trong quần, cậu lôi cố ép cái dương vật căng cứng của mình vào giữa hai đùi trước khi mẹ vào, nhưng không hiểu điều gì lại khiến cậu bắt đầu bóp lấy cái buồi và sục liên tục, hình ảnh trong đầu Hùng bây giờ không còn là những chị nữ sinh lớp trên xinh đẹp hay cô bạn gái của cậu nữa mà là chính là mẹ cậu… tuy chưa bao giờ Hùng nhìn được cơ thể trần truồng của mẹ, nhưng ấn tượng đầu tiên về cơ thể Hồng trong Hùng chính là… chùm lông mu rậm rạp của nàng và cặp vú căng tràn… tay chàng sục nhanh dần…

    Tiếng mở cửa làm cậu chợt sực tỉnh khỏi cơn khoái cảm, bỏ tay ra khỏi buồi, cậu nhìn ra ngoài cửa, mẹ cậu đang bước vào với nụ cười nở trên môi, và vẫn như mọi ngày, Hồng bước vào phòng cậu với cái áo ngủ mỏng manh và cặp ngực buông thõng không áo lót làm hằn lên hai cái núm vú khêu gợi, mỗi bước đi của nàng lại làm mùi sữa tắm thơm lừng phảng phất khắp căn phòng.

    – Nhìn cái gì mà nhìn kĩ vậy! – Hồng phát hiện ra ánh mắt bất thường của con…

    – À… đúng là… nay mẹ… mập ra đó nha! – Cậu vội chối phắt đi.

    – Lại chê nữa, ghét không!

    – Hihi… nói lộn, đẹp ra chứ không phải mập ra!

    – Cái lưỡi uốn éo thấy sợ! Còn làm gì nữa không tui tắt đèn nè.

    – À… tắt đi, ngủ chứ làm gì nữa…

    Hồng vừa nằm xuống giường, Hùng đã vội vã quay đi trùm mền kín mít lại, vì càng ngửi cái mùi thơm lan tỏa từ người Hồng, buồi của Hùng cứ tự dưng lại cương cứng lên, Hồng nhìn con ngạc nhiên, tự dưng sao hôm nay Hùng có những hành động rất kì lạ, không bình thường như mọi ngày, đúng là cái tuổi dậy thì, đứa nào cũng dở dở ương ương không biết đường nào mà lần, Hồng vừa định nằm xuống ngủ thì lại thấy Hùng lò đầu ra khỏi mền, nhìn nàng, Hùng ấp úng.

    – Có… cần đấm lưng không…

    Lại một sự quan tâm chăm sóc bất thường của Hùng nữa làm Hồng ngạc nhiên, bình thường thì phải năn nỉ mỏi cả miệng thì Hùng mới chịu xoa lưng matxa cho nàng, tự dưng hôm nay lại chủ động đến vậy.

    – Trời, có phải là Hùng không vậy! Chắc ngày mai trời bão quá – nàng trêu Hùng.

    – Thì… muốn đấm thì đưa đây đấm cho… chứ có gì đâu…

    – Thôi, không cần đâu, nay má… không mỏi.

    Thật ra nàng đang tiếc hùi hụi, nhưng vì lỡ mặc váy ngủ nên không thể nào để Hùng… kéo lên được…

    – Làm cả ngày mà không mỏi hả…

    – Thiệt mà… nhưng mà… chắc mai mỏi nữa, tối mai… nhớ đấm cho má nha…

    – Trời, chưa gì mà biết tối mai mỏi, quay lưng đây, nhanh đi…

    Vừa nói Hùng vừa áp tay lên vai mẹ rồi bóp nhẹ, chỉ vậy thôi cũng đủ làm người Hồng như mềm ra, quả thật hai bờ vai nàng đã mỏi nhừ sau một ngày làm việc.

    – Thôi… không cần đâu… ahh… ui…

    Miệng thì từ chối là vậy nhưng Hồng vội vã quay lưng sang để cho Hùng bóp cho dễ. Người nàng như tan ra dưới bàn tay của Hùng, tuy là con trai nhưng vì không phải làm gì nặng nhọc vất vả nên bàn tay chàng mềm và ấm áp chưa không thô ráp chai cứng như bàn tay của Chiến – chồng nàng, vì đã đấm bóp cho mẹ không ít lần nên trên người Hồng, xoa bóp vuốt ve chỗ nào làm nàng thích nhất thì Hùng đều biết cả, nhưng mục đích của cậu… không phải chỉ là làm cho mẹ thư giãn mà chàng còn muốn hơn thế nữa…

    Ngồi dậy… chàng xoa dần xuống bên dưới lưng Hồng, rồi giả vờ hỏi…

    – Phải dưới đây cũng mỏi không…

    – Ừhm… từ trên cổ xuống dưới lưng chỗ nào cũng mỏi, tay nữa nè… bóp cho mẹ đi… – Hồng thú nhận…

    – Vậy mà kêu không mỏi, úp xuống đi, con xoa cho…

    Hồng cười thích chí, chưa bao giờ nàng thấy con mình ga lăng đến vậy, kê cái gối rồi úp mặt xuống, nàng nằm im chờ đợi sự chăm sóc của con, bàn tay Hùng hết xoa hai bên cổ rồi lại ấn lên bả vai rồi kéo xuống hai bên hông, cả cơ thể mệt mỏi của nàng h thấy nhẹ nhõm hẳn.

    – Ui… đúng rồi… mạnh lên xíu nữa đi Hùng…

    – Đã không…

    – Đã lắm… mạnh lên nữa đi…

    – Nhưng mà… cái áo vướng víu khó chịu quá… cởi ra nhen…

    Đặt tay lên vạt áo Hồng, Hùng vừa kéo nhẹ lên, vừa nhìn mẹ thăm dò.

    – Ấy… thôi… không cần đâu… con cứ làm bên ngoài cũng được… cũng đã lắm… ahhhh…

    Nhưng nàng không thể phản đối thêm khi Hùng đã tốc ngược váy ngủ nàng lên khỏi đùi…

    – Ấy… đừng con… – nàng cảm thấy ngượng khi cặp đùi mình bị hở ra…

    – Gì đâu mà ngại, tối om mà… – Hùng vẫn lì lợm kéo ngược áo ngủ của mẹ lên, dần dần cặp mông của nàng cũng tuột ra khỏi áo ngủ…

    – Nhưng mà… – miệng thì phản đối nhưng nàng vẫn nhích người lên để cho Hùng tuột hết cái áo ngủ lên trên, dù sao thì tắt điện rồi, nó có thấy được gì đâu, mà nó là con mình mà, có gì mà phải ngại – nàng nhủ thầm.

    Còn Hùng thì đang hồi hộp đến vỡ tim, chàng không hiểu tại sao mình lại có một hành động bạo dạn đến vậy, nhưng mà dù sao thì… mọi chuyện đã rồi, có lẽ mẹ không hay biết gì ý định của mình – chàng tự nhủ… đặt tay lên đùi Hồng… tay chàng xoa nhẹ quanh đầu gối… rồi dần dần tiến lên trên…

    … Bạn đang đọc truyện Loạn luân mẹ và con tại nguồn: http://truyensextv.moe/loan-luan-me-va-con/

    Trời đã về khuya, mọi vật đã ngủ yên trong màn đêm tĩnh lặng… trên chiếc giường nệm ấm áp của Hùng, Hồng vẫn đang buông những tiếng thở dài, những tiếng rên rỉ đầy thích thú mỗi lần bàn tay Hùng ấn vào đúng những vùng mệt mỏi trên người nàng, nàng không biết điều đó lại càng kích thích những ý nghĩ tà dục trong đầu Hùng, bàn tay Hùng lại càng lúc càng táo bạo hơn, từ xoa bóp quanh bắp chân Hồng, tay chàng đã đặt hẳn lên cặp đùi nõn nà của mẹ, hết ấn rồi lại bóp, làn da mát lạnh mịn màng của cặp đùi Hồng làm buồi của Hùng càng lúc càng cương lên hết cỡ.

    Mãi thả mình trong sự hưng phấn, Hồng không biết rằng thằng con trai cưng của nàng, tay thì xoa chân xoa đùi cho mẹ nhưng mắt thì lại dán chặt vào cặp mông nở nang gợi dục của nàng, mắt Hùng đã dần nhìn ra được những đường cong tuyệt mĩ của cặp mông mẹ ẩn hiện sau chiếc quần lót bó sát vào khe mông, không rõ quần lót mẹ có màu gì nhưng chàng cũng chẳng hề quan tâm, tất cả những gì Hùng muốn lúc này là được kéo tuột nó ra khỏi mông Hồng để được bóp được cắn cho thỏa thích. Nghĩ vậy, tay chàng càng lúc càng đưa dần lên trên…

    – Hùng… ơi… – Hồng khẽ gọi làm chàng giật mình…

    – Gì vậy mẹ…

    – Lên trên chút đi…

    Hùng giật điếng người, chàng không thể tin được… chẳng lẽ mẹ muốn… mình xoa mông cho mẹ sao – chàng kinh ngạc.

    Nhưng khi tay chàng vừa chạm vào mông của Hồng thì bất ngờ nàng đã giãy ra.

    – Không phải chỗ đó… trên lưng ấy!

    – Trời… sao… không nói rõ – chàng lúng túng, suýt chút nữa thì…

    – Ừhm… lưng mẹ chưa đã… con xoa thêm chút nữa đi rồi ngủ được không…

    – Lưng hồi nãy… xoa rồi mà… – Hùng giả vờ tỏ ra khó chịu…

    – Mới chút xíu chứ mấy, thêm chút nữa đi… chìu mẹ chút đi mà, nhé!

    Cái giọng nũng nịu dễ thương của Hồng càng làm Hùng phát cuồng lên, không để mẹ phải đợi lâu, hai tay chàng áp lên lưng mẹ vừa xoa vừa ấn liên tục, càng lúc chàng càng làm thật mạnh và nhanh hơn, chàng muốn nghe âm thanh rên rỉ của Hồng mỗi lần chàng ôm hai bên hông của nàng và ấn mạnh xuống nệm, rồi lại đẩy lên phía trên, cái giường bắt đầu kêu rên răng rắc vì những cú ấn và đẩy liên tiếp của Hùng lên cơ thể Hồng.

    – Ahh… nhẹ thôi Hùng… sao… con làm kiểu gì mà kì vậy… ớ…

    – Kiểu của con… mới nghĩ ra…

    Càng lúc người Hồng càng bị đôi tay mạnh bạo của Hùng hết ấn rồi lại đẩy lên đẩy xuống, không thấy sướng đâu mà cảm giác cứ như là bị… cưỡng hiếp, còn Hùng thì khoái chí nhìn cặp mông của mẹ đong đưa theo nhịp lên xuống, nhưng chỉ cặp mông thôi chưa làm cậu thỏa mãn, một ý nghĩ táo bạo khác chợt lóe lên…

    – Sướng… không mẹ…

    – Thôi… dừng lại đi… ahh… mẹ chóng mặt quá, cái kiểu gì mà cứ đẩy lên đẩy xuống vậy… thôi…

    – Hihi… thật ra con đang… trả thù mẹ đấy…

    – Cái… gì, anh nói cái gì, trả thù gì! – Hồng ngớ người ra…

    – Thì tại lúc nãy mẹ la con ngoài cổng, làm mấy người hàng xóm nghe thấy, ngượng quá trời nè!

    – Hay quá há, con với cái, anh được lắm, dám lợi dụng trả thù tui à!

    – Mà không phải hôm nay không đâu nha, mấy bữa trước cứ về thấy mặt là chửi à! Vậy mà tối nào cũng qua phòng người ta đòi ngủ chung rồi còn bắt đấm bóp nữa chứ!

    Nghe cái giọng hờn dỗi của Hùng, Hồng lại thấy vừa buồn cười vừa tội nghiệp cho con.

    – Hihi… thù dai quá đi, bộ không thích… ngủ với má hả…

    – Thì… ai nói không thích đâu. Nhưng mà… thích ngủ như ngày xưa hơn.

    – Ngày xưa là sao? Ý con là có má có ba với có chị Ngọc ngủ chung nữa hả?

    – Như vậy cũng thích… nhưng mà mình… ngủ riêng với nhau thích hơn… có bà Ngọc nhiều chuyện ghét quá!

    – Thì bữa giờ có con với má thôi chứ ai đâu?

    – Nhưng mà…

    – Nhưng sao, phải… con không ghét má bắt con đấm lưng phải không? Nếu không thích thì thôi… má không bắt nữa…

    – Không phải… trời ơi… con thích… đấm lưng cho má mà, có gì mà ghét, có điều…

    – Có điều gì… nói đi…

    – Con đấm lưng cho má thì má cũng… trả công cho con gì đó chứ…

    – Trời… ghê chưa… mới đấm có chút mà trả công… giờ muốn gì đây, hay má đấm lại cho con nghen, chịu không?

    – Không cần…

    – Chứ giờ thích gì, nói trước là không được vòi vĩnh mấy thứ đắt tiền đâu nhen…

    – Không, đơn giản lắm, má cho con… sờ… ấy được không…

    – Cái gì? Sờ… gì? Đừng nói là… sờ… vú… nha!

    – Chứ… sờ gì nữa, thì như hồi xưa con với má ngủ với nhau ấy, được không?

    – Con sao vậy Hùng, lớn to cái đầu rồi chứ còn bé bỏng gì mà sờ vú!

    – Thì… thì…

    – Không được! Lớn rồi đừng có trẻ con như vậy!

    Hồng gắt lên, nàng không ngờ thằng con to xác của nàng lại đang đòi hỏi làm một chuyện như những đứa trẻ mới lên 5!

    Hùng không ngờ chàng lại bị mẹ từ chối thẳng thừng như vậy, mọi sự hưng phấn trong người chàng tan biến đâu mất hết, chỉ còn lại sự xấu hổ ngượng ngùng của kẻ thua cuộc, không biết nói gì thêm, Hùng đành nằm xích qua một bên rồi trùm mền kín mít lại…

    – Hùng…

    Hồng khẽ lay con, nhưng cậu không trả lời, Hồng thở dài, nàng biết cách từ chối thẳng thừng của nàng vừa làm thằng con xấu hổ, cũng không biết nói gì hơn, nàng cũng lặng lẽ nằm xuống bên cạnh và chìm vào giấc ngủ…
     * */
}
