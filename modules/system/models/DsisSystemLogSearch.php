<?php

namespace app\modules\system\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\system\models\DsisSystemLog;

/**
 * app\modules\system\models\DsisSystemMenuSearch represents the model behind the search form about `app\modules\system\models\DsisSystemMenu`.
 */
 class DsisSystemLogSearch extends DsisSystemLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
        [
            [['user'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 30],
            [['start_login', 'end_login'], 'string', 'max' => 20],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DsisSystemLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'start_login', $this->start_login])
            ->andFilterWhere(['like', 'end_login', $this->end_login])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
