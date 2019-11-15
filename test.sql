ALTER TABLE `answer_award`
COMMENT='答题奖励';

ALTER TABLE `bureau`
COMMENT='闯关';

ALTER TABLE `bureau_question`
COMMENT='闯关与题目关系';

ALTER TABLE `choice_question`
COMMENT='选择题';

ALTER TABLE `question_bank`
COMMENT='标题';

ALTER TABLE `integral_product` COMMENT='积分产品';

alter table `integral_order` comment='积分订单';

alter table `integral_order_sku` comment='积分订单组合多商品';

alter table `integral_purchase` comment='积分抢购';

alter table `integral_shopping` comment='积分购物车';

alter table `integral_category` comment='积分产品分类';

alter table `integral_banner` comment='轮播图';

alter table `integral_product_img` comment='产品图片';

alter table `integral_comment` comment='积分评论';

alter table `integral_comment_img` comment='积分评论图片';

alter table `shipping_address` comment='用户收货地址';

alter table `enshrine` comment='收藏';

alter table `integral_banner` add column `url` varchar(255) default null comment '点击图片url' after `title`;
